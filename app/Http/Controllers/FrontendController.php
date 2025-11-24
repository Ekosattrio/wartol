<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class FrontendController extends Controller
{
    public function index() {
        // Ambil produk yang aktif dan stok > 0
        $products = Product::where('status', 'aktif')
                           ->where('stok', '>', 0)
                           ->get();

        // Ambil kategori unik dari produk aktif
        // Kalau belum ada kolom kategori, kita bisa dummy sementara
        $categories = $products->pluck('kategori')->unique() ?? collect([]);

        return view('index', compact('products', 'categories'));
    }

    public function fillphonenumber(Request $request) {
        $request->validate([
            'phone' => 'required|min:9'
        ]);

        return redirect()->route('payment.index');
    }
}
