<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Barang_Keluar extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'jumlah_keluar',
        'tanggal_keluar',
    ];
}
