<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Transaction::select(
        'order_id',
        'phone',
        'total_amount',
        'payment_method',
        'payment_status',
        'schedule_pickup',
        'status',
        )->get();
    }

    public function headings(): array
    {
        return [
            'ID Pesanan',
            'Nomor Handphone',
            'Jumlah Transaksi',
            'Metode Pembayaran',
            'Status Pembayaran',
            'Jadwal Pickup',
            'Status Pesanan',
        ];
    }
}
