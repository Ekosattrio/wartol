<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PosController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('nama_produk')->get();
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
                'payment_status'   => 'paid',
                'status'           => 'completed',
            ]);

            $receiptDetails = []; // Untuk struk response

            foreach ($cartItems as $item) {
                $product = Product::findOrFail($item['product_id']);

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