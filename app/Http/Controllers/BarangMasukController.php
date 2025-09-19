<?php

namespace App\Http\Controllers;

use App\Models\Barang_Masuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang_masuks = Barang_Masuk::all();
        return view('barang_masuks.index', compact('barang_masuks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang_masuks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_barang' => 'required|exists:barangs,id',
            'id_user' => 'required|exists:users,id',
            'jumlah_masuk' => 'required|integer|min:1',
            'tanggal_masuk' => 'required|date',
        ]);

        $barang_masuks = Barang_Masuk::create([
            'id_barang' => $validated['id_barang'],
            'id_user' => $validated['id_user'],
            'jumlah_masuk' => $validated['jumlah_masuk'],
            'tanggal_masuk' => $validated['tanggal_masuk'],
        ]);

        return redirect()->route('barang_masuks.index')->with('success', 'Barang Masuk created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang_Masuk $barang_Masuk)
    {
        return view('barang_masuks.show', compact('barang_Masuk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang_Masuk $barang_Masuk)
    {
        return view('barang_masuks.edit', compact('barang_Masuk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang_Masuk $barang_Masuk)
    {
        $validated = $request->validate([
            'id_barang' => 'required|exists:barangs,id',
            'id_user' => 'required|exists:users,id',
            'jumlah_masuk' => 'required|integer|min:1',
            'tanggal_masuk' => 'required|date',
        ]);

        $barang_Masuk->update([
            'id_barang' => $validated['id_barang'],
            'id_user' => $validated['id_user'],
            'jumlah_masuk' => $validated['jumlah_masuk'],
            'tanggal_masuk' => $validated['tanggal_masuk'],
        ]);

        return redirect()->route('barang_masuks.index')->with('success', 'Barang Masuk updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang_Masuk $barang_Masuk)
    {
        $barang_Masuk->delete();
        return redirect()->route('barang_masuks.index')->with('success', 'Barang Masuk deleted successfully.');
    }
}
