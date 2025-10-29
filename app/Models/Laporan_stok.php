<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Laporan_Stok extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'laporan_stoks';

    protected $fillable = [
        'id_barang',
        'stok_awal',
        'jumlah_masuk',
        'jumlah_keluar',
        'stok_akhir',
        'periode',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id');
    }
}
