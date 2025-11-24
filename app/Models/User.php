<?php

namespace App\Models;

// Anda HARUS meng-import kelas-kelas ini untuk otentikasi
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Implementasikan Authenticatable
class User extends Model implements Authenticatable
{
    use HasFactory;

    // Gunakan trait standar untuk otentikasi
    use \Illuminate\Auth\Authenticatable;

    /**
     * Nama tabel database.
     */
    protected $table = 'users';

    /**
     * Kolom yang bisa diisi secara massal.
     * Hanya 'phone' sesuai tabel Anda.
     */
    protected $fillable = [
        'phone',
    ];

    /**
     * Kolom yang disembunyikan saat di-serialisasi.
     * Kosongkan karena tidak ada password.
     */
    protected $hidden = [
        //
    ];

    /**
     * Tipe data yang di-cast.
     * Kosongkan karena tidak ada email_verified_at.
     */
    protected $casts = [
        //
    ];

    /**
     * Tentukan apakah tabel menggunakan timestamps.
     * Tabel Anda memilikinya (created_at, updated_at).
     */
    public $timestamps = true;


    // ======================================================
    // INI ADALAH PERBAIKAN FATAL ERROR
    // ======================================================

    // public $rememberTokenName = false; // <-- HAPUS BARIS INI, INI PENYEBAB ERROR

    /**
     * Kita ganti properti yang error tadi dengan method ini
     * untuk menonaktifkan "remember me" token.
     *
     * @return string|null
     */
    public function getRememberTokenName()
    {
        return null; // Return null berarti fitur "remember_token" dimatikan
    }
}
