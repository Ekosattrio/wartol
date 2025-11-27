<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',            // nomor telepon pembeli
        'order_id',         // ID unik untuk Midtrans
        'total_amount',     // total transaksi
        'payment_method',   // qris / midtrans / cash
        'payment_status',   // pending / success / expire / failed
        'schedule_pickup',  // opsional
        'status',           // pending / paid / failed
    ];

    protected $casts = [
        'schedule_pickup' => 'datetime',
    ];

    // Relasi ke detail transaksi (multi item)
    public function details()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    // Relasi ke midtrans logs
    public function logs()
    {
        return $this->hasMany(MidtransLog::class, 'transaction_id');
    }
}
