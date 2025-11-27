<?php

namespace App\Http\Controllers\Penjual;

use App\Exports\LaporanExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index()
    {
        $transactions = Transaction::latest()->get();
        return view('penjual.laporan' , compact('transactions'));

    }
     public function edit() {}
     public function update(Request $request, Transaction $transaction)
    {
        $validatedData = $request->validate([
        'status' => 'required|in:pending,processing,completed',
        ]);

        $transaction->update($validatedData);
        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil diupdate!'
        ]);
    }


    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->route('penjual.laporan')
            ->with('success', 'Transaksi berhasil dihapus.');
    }

    public function exportExcel(){
        return Excel::download(new LaporanExport, 'laporan.xlsx');
    }

    public function exportPDF()
        {
            $data = Transaction::all(); 
            
            $pdf = Pdf::loadView('pdf.pdf_laporan', compact('data'))
                    ->setPaper('A4', 'landscape');
            
            return $pdf->download('laporan-penjualan.pdf');
        }

}
