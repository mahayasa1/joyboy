<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class LaporanStokController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua barang dengan relasi satuan
        $barang = Barang::with('satuan')->get();

        return view('admin.laporan.laporan_stok', compact('barang'));
    }
}
