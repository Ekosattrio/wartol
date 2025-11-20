<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MidtransLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'full_response',
    ];

    protected $casts = [
        'full_response' => 'array', // otomatis convert JSON <-> array
    ];

    // Relasi ke transaksi
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
