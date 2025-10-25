<?php

namespace App\Http\Controllers;

use App\Models\Laporan_stok;
use Illuminate\Http\Request;

class LaporanStokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporan_stoks = Laporan_stok::all();
        return view('laporan_stoks.index', compact('laporan_stoks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('laporan_stoks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_barang' => 'required|exists:barangs,id',
            'stok_awal' => 'required|integer|min:0',
            'jumlah_masuk' => 'required|integer|min:0',
            'jumlah_keluar' => 'required|integer|min:0',
            'stok_akhir' => 'required|integer|min:0',
            'periode' => 'required|date',
        ]);

        Laporan_stok::create([
            'id_barang' => $validatedData['id_barang'],
            'stok_awal' => $validatedData['stok_awal'],
            'jumlah_masuk' => $validatedData['jumlah_masuk'],
            'jumlah_keluar' => $validatedData['jumlah_keluar'],
            'stok_akhir' => $validatedData['stok_akhir'],
            'periode' => $validatedData['periode'],
        ]);
        return redirect()->route('laporan_stoks.index')->with('success', 'Laporan Stok created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Laporan_stok $laporan_stok)
    {
        return view('laporan_stoks.show', compact('laporan_stok'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laporan_stok $laporan_stok)
    {
        return view('laporan_stoks.edit', compact('laporan_stok'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Laporan_stok $laporan_stok)
    {
        $validatedData = $request->validate([
            'id_barang' => 'required|exists:barangs,id',
            'stok_awal' => 'required|integer|min:0',
            'jumlah_masuk' => 'required|integer|min:0',
            'jumlah_keluar' => 'required|integer|min:0',
            'stok_akhir' => 'required|integer|min:0',
            'periode' => 'required|date',
        ]);

        $laporan_stok->update([
            'id_barang' => $validatedData['id_barang'],
            'stok_awal' => $validatedData['stok_awal'],
            'jumlah_masuk' => $validatedData['jumlah_masuk'],
            'jumlah_keluar' => $validatedData['jumlah_keluar'],
            'stok_akhir' => $validatedData['stok_akhir'],
            'periode' => $validatedData['periode'],
        ]);

        return redirect()->route('laporan_stoks.index')->with('success', 'Laporan Stok updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laporan_stok $laporan_stok)
    {
        $laporan_stok->delete();
        return redirect()->route('laporan_stoks.index')->with('success', 'Laporan Stok deleted successfully.');
    }
}
