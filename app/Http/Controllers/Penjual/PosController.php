<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class PosController extends Controller
{
    /**
     * Tampilkan halaman POS dengan daftar produk.
     */
    public function index()
    {
        // Ambil semua produk (paling baru dulu) supaya produk yang baru ditambahkan
        // langsung terlihat di halaman POS. Jika Anda ingin menyembunyikan produk
        // non-aktif, ubah query ini kembali ke filter status.
        $products = Product::latest()->get();

        return view('penjual.pos', compact('products'));
    }

    /**
     * Proses checkout: terima cart, validasi stok, kurangi stok, dan kembalikan struk (data mentah JSON).
     */
    public function checkout(Request $request)
    {
        $validated = $request->validate([
            'cart' => 'required|array|min:1',
            'cart.*.product_id' => 'required|integer|distinct',
            'cart.*.qty' => 'required|integer|min:1',
        ]);

        $cart = $validated['cart'];

        $receipt = [
            'items' => [],
            'subtotal' => 0,
            'total' => 0,
            'created_at' => now()->toDateTimeString(),
        ];

        DB::beginTransaction();
        try {
            foreach ($cart as $line) {
                $product = Product::lockForUpdate()->find($line['product_id']);
                if (!$product) {
                    DB::rollBack();
                    return response()->json(['success' => false, 'message' => "Produk dengan ID {$line['product_id']} tidak ditemukan."], 422);
                }

                if ($product->stok < $line['qty']) {
                    DB::rollBack();
                    return response()->json(['success' => false, 'message' => "Stok tidak cukup untuk produk: {$product->nama_produk}. Tersisa: {$product->stok}"], 422);
                }

                $lineTotal = $product->harga * $line['qty'];

                $receipt['items'][] = [
                    'product_id' => $product->id,
                    'nama_produk' => $product->nama_produk,
                    'harga' => $product->harga,
                    'qty' => $line['qty'],
                    'line_total' => $lineTotal,
                ];

                $receipt['subtotal'] += $lineTotal;

                // Kurangi stok
                $product->stok = $product->stok - $line['qty'];
                $product->save();
            }

            // Untuk sekarang tidak ada pajak/biaya tambahan
            $receipt['total'] = $receipt['subtotal'];

            DB::commit();

            return response()->json(['success' => true, 'receipt' => $receipt]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
