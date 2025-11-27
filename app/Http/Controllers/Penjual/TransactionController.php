<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\MidtransLog;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Midtrans\Snap;
use Midtrans\Config;

class TransactionController extends Controller
{
    public function __construct()
    {
        // Set konfigurasi Midtrans
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = false; // ganti true kalau live
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    // Checkout: user masukkan phone, optional schedule, dan items
    public function checkout(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'schedule_pickup' => 'nullable|date',
            'items' => 'required|array', // array of ['product_id' => x, 'qty' => y]
        ]);

        DB::beginTransaction();
        try {
            $total = 0;
            $transactionItems = [];
            foreach ($request->items as $item) {
                $product = Product::findOrFail($item['product_id']);
                $subtotal = $product->harga * $item['qty'];
                $total += $subtotal;
                $transactionItems[] = [
                    'product_id' => $product->id,
                    'qty' => $item['qty'],
                    'price' => $product->harga,
                    'subtotal' => $subtotal,
                ];
            }

            // Buat transaksi
            $transaction = Transaction::create([
                'phone' => $request->phone,
                'order_id' => 'ORDER-' . Str::upper(Str::random(10)),
                'total_amount' => $total,
                'payment_method' => 'midtrans',
                'payment_status' => 'pending',
                'schedule_pickup' => $request->schedule_pickup,
                'status' => 'pending',
            ]);

            // Simpan detail transaksi
            foreach ($transactionItems as $item) {
                TransactionDetail::create([
                    'transaction_id' => $transaction->id,
                    'product_id' => $item['product_id'],
                    'qty' => $item['qty'],
                    'price' => $item['price'],
                    'subtotal' => $item['subtotal'],
                ]);
            }

            DB::commit();

            // Buat parameter Snap
            $snapParams = [
                'transaction_details' => [
                    'order_id' => $transaction->order_id,
                    'gross_amount' => $transaction->total_amount,
                ],
                'customer_details' => [
                    'phone' => $transaction->phone,
                ],
                'enable_payments' => ['qris'],
            ];

            $snapToken = Snap::getSnapToken($snapParams);

            return response()->json([
                'success' => true,
                'snap_token' => $snapToken,
                'transaction' => $transaction
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    // Callback / notification Midtrans
    public function midtransCallback(Request $request)
    {
        $notification = $request->all();
        $orderId = $notification['order_id'] ?? null;
        $transaction = Transaction::where('order_id', $orderId)->first();

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        // Update status berdasarkan status Midtrans
        $midtransStatus = $notification['transaction_status'] ?? 'pending';
        // Map Midtrans status to our convention
        if (in_array($midtransStatus, ['settlement', 'capture'])) {
            $transaction->payment_status = 'success';
            $transaction->status = 'paid';
        } elseif ($midtransStatus === 'pending') {
            $transaction->payment_status = 'pending';
            $transaction->status = 'pending';
        } elseif ($midtransStatus === 'expire') {
            $transaction->payment_status = 'expire';
            $transaction->status = 'failed';
        } elseif (in_array($midtransStatus, ['deny', 'cancel'])) {
            $transaction->payment_status = 'failed';
            $transaction->status = 'failed';
        } else {
            // Default mapping: pending
            $transaction->payment_status = 'pending';
            $transaction->status = 'pending';
        }
        $transaction->save();

        // Simpan full response
        MidtransLog::create([
            'transaction_id' => $transaction->id,
            'full_response' => $notification,
        ]);

        return response()->json(['message' => 'success']);
    }
}
