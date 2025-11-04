<?php

namespace App\Http\Controllers;

use App\Models\Barang_Masuk;
use App\Models\Barang;
use App\Models\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangMasukController extends Controller
{
    public function index()
    {
        $barang = Barang::with('barangMasuk')->latest()->get();
        return view('admin.barang_masuk.index', compact('barang'));
    }

    public function create()
    {
        return view('admin.barang_masuk.create');
    }

    public function Baru()
    {
        $satuans = Satuan::all();

        // 🔹 Generate kode barang otomatis (A001, A002, dst)
        $latestBarang = Barang::latest('id')->first();
        $nextKode = 'JB001';
        if ($latestBarang) {
            $lastNumber = (int) substr($latestBarang->kode_barang, offset: 3);
            $nextKode = 'JB' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        }

        return view('admin.barang_masuk.baru', compact('satuans', 'nextKode'));
    }

    public function Lama()
    {
        $barang = Barang::all();
        return view('admin.barang_masuk.lama', compact('barang'));
    }

    public function store(Request $request)
    {
        if ($request->has('nama_barang')) {
            // 🔹 Barang baru
            $validated = $request->validate([
                'kode_barang'   => 'required|string|max:10',
                'nama_barang'   => 'required|string|max:255',
                'jumlah_masuk'  => 'required|integer|min:1',
                'tanggal_masuk' => 'required|date',
                'satuan_id'     => 'required|exists:satuans,id',
            ]);

            // Simpan barang baru
            $barang = Barang::create([
                'kode_barang' => $validated['kode_barang'],
                'nama_barang' => $validated['nama_barang'],
                'stok'        => $validated['jumlah_masuk'],
                'satuan_id'   => $validated['satuan_id'],
            ]);

        } else {
            // 🔹 Barang lama
            $validated = $request->validate([
                'id_barang'     => 'required|exists:barangs,id',
                'jumlah_masuk'  => 'required|integer|min:1',
                'tanggal_masuk' => 'required|date',
            ]);

            $barang = Barang::find($validated['id_barang']);
            $barang->stok += $validated['jumlah_masuk'];
            $barang->save();
        }

        // Simpan transaksi barang masuk
        Barang_Masuk::create([
            'id_barang'     => $barang->id,
            'id_user'       => Auth::id(),
            'jumlah_masuk'  => $validated['jumlah_masuk'],
            'tanggal_masuk' => $validated['tanggal_masuk'],
        ]);

        return redirect()->route('barang.index')->with('success', 'Data barang masuk berhasil disimpan!');
    }
}
