<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;

class LaporanController extends Controller
{
    public function index()
    {
        $transactions = Transaction::latest()->get();
        return view('penjual.laporan' , compact('transactions'));

    }

    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('transactions.edit', compact('transaction'));
    }

    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->route('penjual.laporan')
            ->with('success', 'Transaksi berhasil dihapus.');
    }

}
