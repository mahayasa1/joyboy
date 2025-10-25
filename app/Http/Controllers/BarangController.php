<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Satuan;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    // Menampilkan daftar barang
    public function index()
    {
        $barang = Barang::with('satuan')->get();
        return view('admin.barang.index', compact('barang'));
    }

    // Menampilkan form tambah barang
    public function create()
    {
        // Ambil semua data satuan dari tabel satuans
        $satuans = Satuan::select('id', 'nama_satuan')->get();

        return view('admin.barang.create', compact('satuans'));
    }

    // Menyimpan data barang baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_barang' => 'required|string|max:50|unique:barangs,kode_barang',
            'nama_barang' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'satuan_id' => 'required|exists:satuans,id', // validasi untuk foreign key
        ]);

        Barang::create([
            'kode_barang' => $validated['kode_barang'],
            'nama_barang' => $validated['nama_barang'],
            'stok' => $validated['stok'],
            'satuan_id' => $validated['satuan_id'], // disesuaikan dengan foreign key di tabel barangs
        ]);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    // Menampilkan detail barang (opsional)
    public function show(Barang $barang)
    {
        return view('admin.barang.show', compact('barang'));
    }

    // Form edit barang
    public function edit(Barang $barang)
    {
        $satuans = Satuan::select('id', 'nama_satuan')->get();
        return view('barang.edit', compact('barang', 'satuans'));
    }

    // Update barang
    public function update(Request $request, Barang $barang)
    {
        $validated = $request->validate([
            'kode_barang' => 'required|string|max:50|unique:barangs,kode_barang,' . $barang->id,
            'nama_barang' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'satuan_id' => 'required|exists:satuans,id',
        ]);

        $barang->update([
            'kode_barang' => $validated['kode_barang'],
            'nama_barang' => $validated['nama_barang'],
            'stok' => $validated['stok'],
            'satuan_id' => $validated['satuan_id'], // disesuaikan dengan foreign key di tabel barangs
        ]);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui!');
    }

    // Hapus barang
    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus!');
    }
}
