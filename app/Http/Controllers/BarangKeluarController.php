<?php

namespace App\Http\Controllers;

use App\Models\Barang_Keluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan daftar barang keluar
        $barang_keluars = Barang_Keluar::all();
        return view('barang_keluars.index', compact('barang_keluars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang_keluars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_barang' => 'required|exists:barangs,id',
            'id_user' => 'required|exists:users,id',
            'jumlah_keluar' => 'required|integer|min:1',
            'tanggal_keluar' => 'required|date',
        ]);

        Barang_Keluar::create([
            'id_barang' => $validatedData['id_barang'],
            'id_user' => $validatedData['id_user'],
            'jumlah_keluar' => $validatedData['jumlah_keluar'],
            'tanggal_keluar' => $validatedData['tanggal_keluar'],
        ]);  
        return redirect()->route('barang_keluars.index')->with('success', 'Barang Keluar created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang_Keluar $barang_Keluar)
    {
        return view('barang_keluars.show', compact('barang_Keluar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang_Keluar $barang_Keluar)
    {
        return view('barang_keluars.edit', compact('barang_Keluar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang_Keluar $barang_Keluar)
    {
        $validatedData = $request->validate([
            'id_barang' => 'required|exists:barangs,id',
            'id_user' => 'required|exists:users,id',
            'jumlah_keluar' => 'required|integer|min:1',
            'tanggal_keluar' => 'required|date',
        ]);
        $barang_Keluar->update($validatedData);
        return redirect()->route('barang_keluars.index')->with('success', 'Barang Keluar updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang_Keluar $barang_Keluar)
    {
        $barang_Keluar->delete();
        return redirect()->route('barang_keluars.index')->with('success', 'Barang Keluar deleted successfully.');
    }
}
