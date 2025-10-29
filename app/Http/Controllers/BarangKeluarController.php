<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Barang_Keluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangKeluarController extends Controller
{
    // Menampilkan daftar barang keluar
    public function index()
    {
        $barang_keluar = Barang_Keluar::with('barang', 'user')->latest()->get();
        return view('admin.barang_keluar.index', compact('barang_keluar'));
    }

    // Menampilkan form tambah barang keluar
    public function create()
    {
        $barang = Barang::with('satuan')->get();
        return view('admin.barang_keluar.create', compact('barang'));
    }

    // Menyimpan data barang keluar + kurangi stok
    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required|exists:barangs,id',
            'jumlah_keluar' => 'required|integer|min:1',
            'tanggal_keluar' => 'required|date',
        ]);

        $barang = Barang::findOrFail($request->id_barang);

        // Cek apakah stok mencukupi
        if ($barang->stok < $request->jumlah_keluar) {
            return back()->with('error', 'Stok barang tidak mencukupi!')->withInput();
        }

        // Kurangi stok barang
        $barang->stok -= $request->jumlah_keluar;
        $barang->save();

        // Simpan data barang keluar
        Barang_Keluar::create([
            'id_barang' => $barang->id,
            'id_user' => Auth::id(),
            'jumlah_keluar' => $request->jumlah_keluar,
            'tanggal_keluar' => $request->tanggal_keluar,
        ]);

        return redirect()->route('barang.index')->with('success', 'Data barang keluar berhasil disimpan dan stok dikurangi!');
    }
}
