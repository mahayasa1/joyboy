<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Barang_Keluar extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'barang_keluars';
    protected $fillable = [
        'id_barang',
        'id_user',
        'jumlah_keluar',
        'tanggal_keluar',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
