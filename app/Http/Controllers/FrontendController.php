<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index() {
        return view('index');
    }

    public function fillphonenumber(Request $request) {

        // Validasi sederhana (opsional)
        $request->validate([
            'phone' => 'required|min:9'
        ]);

        // Kalau valid masuk ke payment
        return redirect()->route('payment.index');

        // kalau mau handle gagal, tambahin else nya
    }
}
