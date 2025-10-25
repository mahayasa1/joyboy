<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Barang extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'stok',
        'satuan_id',
    ];

    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'satuan_id', 'id');
    }

}
