<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PosController extends Controller
{
    public function index()
    {
        $products = Product::where('status', 'aktif')->orderBy('nama_produk')->get();
        return view('penjual.pos', compact('products'));
    }

    public function checkout(Request $request)
    {
        $cartItems = $request->input('cart', []);

        if (empty($cartItems)) {
            return response()->json(['success' => false, 'message' => 'Keranjang kosong.'], 400);
        }

        // Validasi dasar
        $validator = validator($request->all(), [
            'cart' => 'required|array|min:1',
            'cart.*.product_id' => 'required|integer|exists:products,id',
            'cart.*.qty' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => 'Data tidak valid.', 'errors' => $validator->errors()], 422);
        }

        // Schedule pickup is optional for POS (internal cashier). If provided, validate it is not in the past.
        $schedulePickup = $request->input('schedule_pickup');
        if (!empty($schedulePickup)) {
            try {
                $scheduleDt = Carbon::parse($schedulePickup);
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'message' => 'Format jadwal pickup tidak valid.'], 400);
            }
            // require pickup schedule to be at least 1 minute in the future
            if ($scheduleDt->lt(Carbon::now()->addMinute())) {
                return response()->json(['success' => false, 'message' => 'Jadwal pickup tidak boleh sebelum waktu sekarang.'], 400);
            }
        } else {
            // null schedule allowed for POS
            $schedulePickup = null;
        }

        $totalAmount = 0;
        $receipt = null;

        DB::beginTransaction();
        try {
            // 1. Buat Transaksi Utama
                $transaction = Transaction::create([
                    'transaction_code' => 'POS-' . strtoupper(Str::random(10)),
                    'phone'            => '0000000000', // Placeholder
                    'total_amount'     => 0, // Akan diupdate nanti
                    'payment_method'   => 'cash',
                    'payment_status'   => 'success', // success per payment gateway semantics
                    'status'           => 'paid',
                    'schedule_pickup'  => $schedulePickup ? Carbon::parse($schedulePickup) : null,
                ]);

            $receiptDetails = []; // Untuk struk response

            foreach ($cartItems as $item) {
                $product = Product::findOrFail($item['product_id']);

                // Cek status produk
                if ($product->status !== 'aktif') {
                    throw new \Exception('Produk "' . $product->nama_produk . '" tidak tersedia saat ini.');
                }

                // Cek stok
                if ($product->stok < $item['qty']) {
                    throw new \Exception('Stok untuk produk "' . $product->nama_produk . '" tidak mencukupi.');
                }

                $subtotal = $product->harga * $item['qty'];
                $totalAmount += $subtotal;

                // 2. Buat Detail Transaksi
                $detail = TransactionDetail::create([
                    'transaction_id' => $transaction->id,
                    'product_id'     => $product->id,
                    'qty'            => $item['qty'],
                    'price'          => $product->harga,
                    'subtotal'       => $subtotal,
                ]);

                // 3. Kurangi Stok Produk
                $product->decrement('stok', $item['qty']);

                $receiptDetails[] = [
                    'product_name' => $product->nama_produk,
                    'qty'          => $detail->qty,
                    'price'        => $detail->price,
                    'subtotal'     => $detail->subtotal,
                ];
            }

            // 4. Update Total Amount di Transaksi Utama
            $transaction->update(['total_amount' => $totalAmount]);

            DB::commit();

            // Siapkan struk untuk response
            $receipt = $transaction->toArray();
            $receipt['details'] = $receiptDetails;

            return response()->json([
                'success' => true,
                'message' => 'Checkout berhasil!',
                'receipt' => $receipt
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}