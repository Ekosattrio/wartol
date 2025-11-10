<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
     protected $table = 'transactions'; // nama tabel di DB
    protected $fillable = [
        'transaction_code',
        'phone',
        'total_amount',
        'payment_method',
        'payment_status',
        'midtrans_order_id',
        'midtrans_transaction_id',
        'midtrans_status_code',
        'schedule_pickup',
        'status',
    ];
}
