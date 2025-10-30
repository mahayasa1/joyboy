<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Barang extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'barangs';

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'stok',
        'satuan_id',
    ];

    /**
     * Relasi ke tabel Satuan
     * Setiap barang memiliki satu satuan
     */
    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'satuan_id', 'id');
    }

    /**
     * Relasi ke tabel Barang Masuk
     * Satu barang bisa memiliki banyak data masuk
     */
    public function barangMasuk()
    {
        return $this->hasMany(Barang_Masuk::class, 'id_barang', 'id');
    }

    /**
     * Relasi ke tabel Barang Keluar
     * Satu barang bisa memiliki banyak data keluar
     */
    public function barangKeluar()
    {
        return $this->hasMany(Barang_Keluar::class, 'id_barang', 'id');
    }

    public function laporanStok()
    {
        return $this->hasMany(Laporan_Stok::class, 'id_barang', 'id');
    }
}
