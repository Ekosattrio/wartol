<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Transaction; 
use App\Models\TransactionDetail; 
use Midtrans\Config;
use Midtrans\Snap;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = filter_var(env('MIDTRANS_PRODUCTION', false), FILTER_VALIDATE_BOOLEAN);
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Disable SSL verification untuk development
        Config::$curlOptions = [
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
        ];
    }

    public function createOrderJs(Request $request)
    {
        // ✅ Log request untuk debugging
        Log::info('=== CHECKOUT REQUEST START ===');
        Log::info('Request payload:', $request->all());
        
        DB::beginTransaction();
        
        try {
            // ✅ Validasi input
            $phone = $request->input('phone');
            $schedulePickup = $request->input('schedule_pickup');
            $requestItems = $request->input('items', []);

            if (!$phone) {
                return response()->json([
                    'message' => 'Gagal membuat transaksi',
                    'error' => 'Nomor telepon wajib diisi'
                ], 400);
            }

            if (empty($requestItems) || !is_array($requestItems)) {
                return response()->json([
                    'message' => 'Gagal membuat transaksi',
                    'error' => 'Items kosong atau format tidak valid'
                ], 400);
            }

            // Validasi schedule pickup: wajib diisi dan tidak boleh sebelum waktu sekarang
            if (empty($schedulePickup)) {
                DB::rollBack();
                return response()->json([
                    'message' => 'Gagal membuat transaksi',
                    'error' => 'Jadwal pickup wajib diisi'
                ], 400);
            }

            try {
                $scheduleDt = Carbon::parse($schedulePickup);
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json([
                    'message' => 'Gagal membuat transaksi',
                    'error' => 'Format jadwal pickup tidak valid'
                ], 400);
            }

                // require schedule pick up to be at least 1 minute in the future
                if ($scheduleDt->lt(Carbon::now()->addMinute())) {
                DB::rollBack();
                return response()->json([
                    'message' => 'Gagal membuat transaksi',
                    'error' => 'Jadwal pickup harus di masa kini atau di masa depan'
                ], 400);
            }

            Log::info('Items dari request:', ['count' => count($requestItems), 'items' => $requestItems]);

            // ✅ Generate Order ID
            $orderId = 'TRX-' . time() . '-' . rand(100, 999);
            
            $totalAmount = 0;
            $transactionDetails = [];
            $midtransItems = [];

            // ✅ Loop items dengan validasi ketat
            foreach ($requestItems as $index => $item) {
                Log::info("Processing item #{$index}:", $item);
                
                // Validasi struktur item
                if (!isset($item['product_id']) || !isset($item['qty'])) {
                    Log::warning("Item #{$index} skipped - missing keys");
                    continue;
                }

                $productId = intval($item['product_id']);
                $qty = intval($item['qty']);

                if ($productId <= 0 || $qty <= 0) {
                    Log::warning("Item #{$index} skipped - invalid values", [
                        'product_id' => $productId,
                        'qty' => $qty
                    ]);
                    continue;
                }

                // ✅ Cari produk di database
                $product = Product::find($productId);

                if (!$product) {
                    Log::error("Product not found:", ['product_id' => $productId]);
                    DB::rollBack();
                    return response()->json([
                        'message' => 'Gagal membuat transaksi',
                        'error' => "Produk dengan ID {$productId} tidak ditemukan di database"
                    ], 400);
                }

                // ✅ Validasi stok (jika ada)
                if (isset($product->stok) && $product->stok < $qty) {
                    DB::rollBack();
                    return response()->json([
                        'message' => 'Gagal membuat transaksi',
                        'error' => "Stok produk '{$product->nama_produk}' tidak cukup. Tersedia: {$product->stok}"
                    ], 400);
                }

                // ✅ Hitung subtotal
                $unitPrice = intval($product->harga);
                $subtotal = $unitPrice * $qty;
                $totalAmount += $subtotal;

                // ✅ Simpan detail untuk database
                $transactionDetails[] = [
                    'product_id' => $product->id,
                    'qty' => $qty,
                    'price' => $unitPrice,
                    'subtotal' => $subtotal,
                ];

                // ✅ Simpan detail untuk Midtrans
                $midtransItems[] = [
                    'id' => strval($product->id),
                    'price' => $unitPrice,
                    'quantity' => $qty,
                    'name' => $product->nama_produk ?? 'Produk',
                ];

                Log::info("Item #{$index} processed:", [
                    'product_id' => $product->id,
                    'name' => $product->nama_produk,
                    'qty' => $qty,
                    'price' => $unitPrice,
                    'subtotal' => $subtotal
                ]);
            }

            // ✅ Validasi: harus ada minimal 1 item valid
            if (empty($transactionDetails)) {
                DB::rollBack();
                return response()->json([
                    'message' => 'Gagal membuat transaksi',
                    'error' => 'Tidak ada item valid yang bisa diproses'
                ], 400);
            }

            Log::info('Total amount calculated:', ['total' => $totalAmount]);

            // ✅ Simpan transaksi ke database
            $transaction = Transaction::create([
                'order_id' => $orderId,
                'phone' => $phone,
                'total_amount' => $totalAmount,
                'payment_method' => 'midtrans',
                'payment_status' => 'pending',
                'schedule_pickup' => $schedulePickup ? Carbon::parse($schedulePickup) : null,
                'status' => 'pending',
            ]);

            Log::info('Transaction created:', ['id' => $transaction->id, 'order_id' => $orderId]);

            // ✅ Simpan transaction details
            foreach ($transactionDetails as $detail) {
                TransactionDetail::create([
                    'transaction_id' => $transaction->id,
                    'product_id' => $detail['product_id'],
                    'qty' => $detail['qty'],
                    'price' => $detail['price'],
                    'subtotal' => $detail['subtotal'],
                ]);
            }

            Log::info('Transaction details saved:', ['count' => count($transactionDetails)]);

            // ✅ Kurangi stok (opsional, bisa diaktifkan setelah payment success)
            // foreach ($transactionDetails as $detail) {
            //     $product = Product::find($detail['product_id']);
            //     if ($product && isset($product->stok)) {
            //         $product->stok = max(0, $product->stok - $detail['qty']);
            //         $product->save();
            //     }
            // }

            // ✅ Generate Midtrans Snap Token
           $params = [
    'enabled_payments' => [
        'credit_card',
        'cstore',
        'akulaku',
        'gopay',
        'shopeepay',
        'qris',
        'bca_va',
        'bni_va',
        'bri_va',
        'permata_va',
        'echannel',
        'other_va'
    ],
    'transaction_details' => [
        'order_id' => $orderId,
        'gross_amount' => $totalAmount,
    ],
    'customer_details' => [
        'first_name' => 'Customer',
        'phone' => $phone,
    ],
    'item_details' => $midtransItems,
];


            Log::info('Midtrans params:', $params);

            $snapToken = Snap::getSnapToken($params);

            Log::info('Snap token generated:', ['snap_token' => substr($snapToken, 0, 20) . '...']);

            DB::commit();

            Log::info('=== CHECKOUT SUCCESS ===');

            return response()->json([
                'message' => 'Transaksi berhasil dibuat',
                'order_id' => $orderId,
                'snap_token' => $snapToken,
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            
            Log::error('=== CHECKOUT ERROR ===');
            Log::error('Error message: ' . $e->getMessage());
            Log::error('Error file: ' . $e->getFile());
            Log::error('Error line: ' . $e->getLine());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return response()->json([
                'message' => 'Gagal membuat transaksi',
                'error' => $e->getMessage() . ' (Line: ' . $e->getLine() . ')'
            ], 500);
        }
    }
}