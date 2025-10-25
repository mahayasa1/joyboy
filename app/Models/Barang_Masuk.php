<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
}
