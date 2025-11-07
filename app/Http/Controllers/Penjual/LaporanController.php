<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        return view('penjual.laporan');
    }

    public function status()
    {
        // nanti tambahin logic kalau emang dipakai
    }

    public function showInvoice()
    {
        // tampilkan detail invoice
    }
    
    public function store(Request $request)
    {
        // contoh:
        // Laporan::create($request->all());
    }
}
