<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $satuan = Satuan::all();
        return view('admin.satuan.index', compact('satuan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.satuan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_satuan' => 'required|string|max:100|unique:satuans',
        ]);

        Satuan::create([
            'nama_satuan' => $validated['nama_satuan'],
        ]);
        return redirect()->route('satuan.index')->with('success', 'Satuan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Satuan $satuan)
    {
        return view('admin.satuan.show', compact('satuan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Satuan $satuan)
    {
        return view('admin.satuan.edit', compact('satuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Satuan $satuan)
    {
        $validated = $request->validate([
            'nama_satuan' => 'required|string|max:100|unique:satuans,nama_satuan,' . $satuan->id,
        ]);

        $satuan->update([
            'nama_satuan' => $validated['nama_satuan'],
        ]);
        return redirect()->route('satuan.index')->with('success', 'Satuan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Satuan $satuan)
    {
        $satuan->delete();
        return redirect()->route('satuan.index')->with('success', 'Satuan deleted successfully.');
    }
}
