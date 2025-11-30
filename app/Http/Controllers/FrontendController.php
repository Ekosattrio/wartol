<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Models\Product;
use App\Models\Transaction;

class FrontendController extends Controller
{
    public function index() {
        // Jika wartol ditutup, tampilkan halaman pemberitahuan tutup
        if (!Cache::get('wartol_open', true)) {
            return view('closed');
        }
        // Ambil produk yang aktif dan stok > 0
        $products = Product::where('status', 'aktif')
                           ->where('stok', '>', 0)
                           ->get(['id','nama_produk','harga','stok','status','image_path']);

        // Ambil kategori unik dari produk aktif
        // Kalau belum ada kolom kategori, kita bisa dummy sementara
        $categories = $products->pluck('kategori')->unique() ?? collect([]);

        // Ambil riwayat transaksi untuk user yang terautentikasi (berdasarkan phone)
        $orders = collect();
        if (Auth::check() && !empty(Auth::user()->phone)) {
            $phone = Auth::user()->phone;
            // Ambil hanya transaksi yang berstatus 'success' (sudah dibayar di payment gateway)
            $orders = Transaction::with('details.product')
                        ->where('phone', $phone)
                        ->where('payment_status', 'success')
                        ->orderByDesc('created_at')
                        ->limit(20)
                        ->get();
        }

        return view('index', compact('products', 'categories', 'orders'));
    }

    public function fillphonenumber(Request $request) {
        $request->validate([
            'phone' => 'required|min:9'
        ]);

        return redirect()->route('payment.index');
    }
}
