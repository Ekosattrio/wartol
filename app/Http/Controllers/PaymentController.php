<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index() {
        // resources/views/payment/index.blade.php
        return view('payment.index');
    }

    public function status() {
        //
    }

    public function showInvoice() {
        //
    }

    public function store(Request $request) {
        // store ke db
    }
}
