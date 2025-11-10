<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validasi input dari form (name="username" dan name="password")
        $credentials = $request->validate([
            'username' => ['required', 'string'], // Ganti 'username' (aturan) jadi 'string'
            'password' => ['required'],
        ]);

        // 2. Buat array untuk dicocokkan ke database (kolom 'username' dan 'password')
        $loginAttempt = [
            'username' => $credentials['username'],
            'password' => $credentials['password']
        ];

        // INI BAGIAN PENTINGNYA:
        // Kita coba login menggunakan guard 'admin'
        if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            // Berhasil, arahkan ke dashboard admin
            return redirect()->intended('/penjual/produk');
        }

        // Gagal, kembalikan ke form login (modal) dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    /**
     * Menangani logout admin
     */
    public function destroy(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); // Arahkan ke halaman utama
    }
}
