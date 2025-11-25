<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Services\SmsService;

class OtpAuthController extends Controller
{
    public function showVerifyForm(Request $request)
    {
        if (!$request->session()->has('phone_for_verification')) {
            return redirect()->route('home');
        }
        return view('verif-otp');
    }

    public function sendOtp(Request $request)
    {
        $request->validate([
            'phone' => 'required|string|min:10|max:17',
        ]);

        // --- 1. NORMALISASI NOMOR HP ---
        $phoneInput = $request->phone;
        // Hapus karakter aneh, sisakan angka saja
        $phoneNumber = preg_replace('/[^0-9]/', '', $phoneInput);

        // Pastikan format jadi +62...
        // if (str_starts_with($phoneNumber, '0')) {
        //     $phoneNumber = '+62' . substr($phoneNumber, 1);
        // } else if (str_starts_with($phoneNumber, '62')) {
        //     $phoneNumber = '+' . $phoneNumber;
        // } else if (!str_starts_with($phoneNumber, '+')) {
        //     // Jaga-jaga kalau user input 858... tanpa 0
        //     $phoneNumber = '+62' . $phoneNumber;
        // }

        // --- 2. LOG DEBUGGING (Cek Log jika Gagal) ---
        // Ini akan muncul di storage/logs/laravel.log
        Log::info("Mencoba kirim OTP. Input: $phoneInput -> Hasil Convert: $phoneNumber");

        // --- 3. LOGIKA OTP ---
        $otp = rand(100000, 999999);

        // Simpan OTP di Cache selama 5 menit
        Cache::put('otp_for_' . $phoneNumber, $otp, now()->addMinutes(5));
        $request->session()->put('phone_for_verification', $phoneNumber);

        try {
            // Inisialisasi Service SMS
            // Pastikan SmsService sudah diperbaiki seperti kode di atas
            $smsService = new SmsService();

            $message = "Kode verifikasi Warteg Online Anda: " . $otp;

            // Kirim SMS
            $smsService->send($phoneNumber, $message);

            Log::info("SUKSES: SMS OTP terkirim ke $phoneNumber");

            // Hapus session development (opsional)
            $request->session()->forget('development_otp');
        } catch (\Exception $e) {
            // Log error lengkap
            Log::error('GAGAL Kirim SMS: ' . $e->getMessage());

            // Return error ke user
            return back()->withErrors(['phone' => 'Gagal kirim SMS: ' . $e->getMessage()]);
        }

        return redirect()->route('auth.verify.form');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|string|min:6|max:6',
        ]);

        $phoneNumber = $request->session()->get('phone_for_verification');

        if (!$phoneNumber) {
            return redirect()->route('home')->withErrors(['otp' => 'Sesi habis. Ulangi login.']);
        }

        $storedOtp = Cache::get('otp_for_' . $phoneNumber);

        if (!$storedOtp) {
            return back()->withErrors(['otp' => 'Kode OTP kedaluwarsa. Kirim ulang kode.']);
        }

        if ($request->otp == $storedOtp) {
            // Login atau Buat User Baru
            $user = User::firstOrCreate(
                ['phone' => $phoneNumber],
                // Jika mau nambah data default user baru, taruh array kedua disini
                ['name' => 'Pelanggan Baru']
            );

            Auth::login($user);

            Cache::forget('otp_for_' . $phoneNumber);
            $request->session()->forget('phone_for_verification');

            return redirect()->route('dashboard'); // Ganti route sesuai kebutuhan
        } else {
            return back()->withErrors(['otp' => 'Kode OTP salah.']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
