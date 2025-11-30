<?php

namespace App\Http\Controllers\Penjual;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // <--- TAMBAHKAN INI

class ProductController extends Controller
{
    // public function index()
    // {
    //     return view('penjual.produk');
    // }

    public function index()
    {
        $products = Product::latest()->get();

        return view('penjual.produk', compact('products'));
    }

    public function create() {}

    public function store(Request $request)
    {
        // Validasi
        $validatedData = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga'       => 'required|integer|min:0',
            'stok'        => 'required|integer|min:0',
            'image_path'  => 'required|string'
        ]);

        // Buat data
        $dataToCreate = $validatedData;
        $dataToCreate['status'] = 'nonaktif'; 
        Product::create($dataToCreate);

        // KEMBALIKAN JSON (ini yang dibaca AJAX)
        return response()->json([
            'success' => true,
            'message' => 'Produk baru berhasil ditambahkan!'
        ]);
    }

    public function show() {}

    public function edit() {}

    public function update(Request $request, Product $product)
    {
        // 1. Validasi HANYA stok dan status
        $validatedData = $request->validate([
            'stok'   => 'required|integer|min:0',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        // 2. Update produk
        $product->update($validatedData);

        // 3. Kirim respon JSON (karena kita pakai AJAX)
        // Respon ini akan dibaca oleh script di produk.blade.php
        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil diupdate!'
        ]);
    }

    public function destroy(Product $product)
    {
        // 1. Hapus produk dari database
        $product->delete();

        // (Jika Anda punya gambar, logik hapus file gambarnya ada di sini)
        // if ($product->gambar) {
        //     Storage::disk('public')->delete($product->gambar);
        // }

        // 2. Kirim respon JSON sukses
        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil dihapus!'
        ]);
    }

    public function uploadImage(Request $request)
{
    $request->validate([
        'file' => 'required|image|mimes:jpeg,png,jpg|max:5120' // 5MB max
    ]);

    $path = $request->file('file')->store('produk', 'public');

    return response()->json([
        'path' => $path
    ]);
}

}
