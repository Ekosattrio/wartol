<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'nama_produk',
        'harga',
        'stok',
        'status',
    ];

    // ✅ Accessor untuk memudahkan akses (opsional)
    public function getNameAttribute()
    {
        return $this->nama_produk;
    }

    public function getPriceAttribute()
    {
        return $this->harga;
    }

    public function getStockAttribute()
    {
        return $this->stok;
    }
}