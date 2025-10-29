<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Barang_Masuk extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'barang_masuks';

    protected $fillable = [
        'id_barang',
        'id_user',
        'jumlah_masuk',
        'tanggal_masuk',
    ];

    /**
     * Relasi ke tabel Barang
     * Setiap barang_masuk milik satu barang
     */
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id');
    }

    /**
     * Relasi ke tabel User
     * Untuk tahu siapa yang input barang
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
