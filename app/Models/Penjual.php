<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// GANTI INI: use Illuminate\Database\Eloquent\Model;
// MENJADI INI:
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Penjual extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'penjual';
    protected $fillable = [
        'name',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
