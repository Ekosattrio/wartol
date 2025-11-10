<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_code',
        'phone',
        'total_amount',
        'payment_method',
        'payment_status',
        'schedule_pickup',
        'status',
    ];

    public function details()
    {
        return $this->hasMany(TransactionDetail::class);
    }
}
