<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Barang_Masuk extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'jumlah_masuk',
        'tanggal_masuk',
    ];
}
