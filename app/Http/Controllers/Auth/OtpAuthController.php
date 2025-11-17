<?php

namespace App\Http\Controllers\Auth; // 1. Pastikan namespacenya benar

use App\Http\Controllers\Controller; // 2. Pastikan ini ada
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Services\SmsService;

class OtpAuthController extends Controller
{
    /**
     * Menampilkan halaman index (baru).
     */
    public function showIndex()
    {
        return view('welcome');
    }

    /**
     * Method showLoginForm() lama dihapus.
     */
    // public function showLoginForm() { ... } // <-- HAPUS METHOD INI

    /**
     * Membuat dan mengirim OTP.  * Jika gagal, akan redirect back() ke index.
     * Jika sukses, akan redirect route() ke verify.form.  * Tidak ada perubahan di sini.
     */
    public function sendOtp(Request $request)
    {
        $request->validate([
            'phone' => 'required|string|regex:/^[0-9\-\+\s\(\)]+$/|min:10|max:15',
        ]);

        $phoneNumber = $request->phone;
        $otp = rand(100000, 999999);
        Cache::put('otp_for_' . $phoneNumber, $otp, now()->addMinutes(5));
        $request->session()->put('phone_for_verification', $phoneNumber);

        try {
            // $smsService = new SmsService();
            // $message = "Kode verifikasi Anda adalah: " . $otp;
            // $smsService->send($phoneNumber, $message);

            Log::info("OTP untuk $phoneNumber adalah: $otp");
            $request->session()->put('development_otp', $otp);
        } catch (\Exception $e) {
            Log::error('SMS Gagal Terkirim: ' . $e->getMessage());
            return back()->withErrors(['phone' => 'Gagal mengirim SMS verifikasi. Coba lagi nanti.']);
        }

        // --- PENTING ---
        // Redirect ke halaman verifikasi OTP yang terpisah
        return redirect()->route('auth.verify.form');
    }

    /**
     * Menampilkan form verifikasi OTP.
     * Tidak ada perubahan di sini.
     */
    public function showVerifyForm(Request $request)
    {
        if (!$request->session()->has('phone_for_verification')) {
            // Jika tidak ada sesi, kembalikan ke index
            return redirect()->route('index');
        }
        return view('verif-otp');
    }

    /**
     * Memverifikasi OTP dan me-login/register-kan user.
     * Tidak ada perubahan di sini.
     */
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|string|min:6|max:6',
        ]);

        $phoneNumber = $request->session()->get('phone_for_verification');

        if (!$phoneNumber) {
            // Jika sesi habis, kembalikan ke index
            return redirect()->route('index')->withErrors(['otp' => 'Sesi Anda telah kedaluwarsa. Silakan masukkan nomor HP Anda lagi.']);
        }

        $storedOtp = Cache::get('otp_for_' . $phoneNumber);

        if (!$storedOtp) {
            return back()->withErrors(['otp' => 'Kode OTP sudah kedaluwarsa.']);
        }

        if ($request->otp == $storedOtp) {
            $user = User::firstOrCreate(['phone' => $phoneNumber]);
            Auth::login($user);
            Cache::forget('otp_for_' . $phoneNumber);
            $request->session()->forget('phone_for_verification');
            $request->session()->forget('development_otp');

            // Redirect ke dashboard
            return redirect()->route('dashboard');
        } else {
            return back()->withErrors(['otp' => 'Kode OTP tidak valid.']);
        }
    }

    /**
     * Logout user.
     * Tidak ada perubahan di sini.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Kembalikan ke halaman index
        return redirect()->route('index');
    }
}
