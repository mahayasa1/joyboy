@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Tambah Barang</h2>

<form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow rounded-lg p-6 space-y-4">
    @csrf
    <div>
        <label class="block text-gray-700">Kode Barang</label>
        <input type="text" name="kode_barang" class="w-full border rounded px-3 py-2" required>
    </div>
    <div>
        <label class="block text-gray-700">Nama Barang</label>
        <input type="text" name="nama_barang" class="w-full border rounded px-3 py-2" required>
    </div>
    <div>
        <label class="block text-gray-700">Stok</label>
        <input type="number" name="stok" class="w-full border rounded px-3 py-2" required>
    </div>
    <div>
    <label class="block text-gray-700">Satuan</label>
    <select name="satuan_id" class="w-full border rounded px-3 py-2" required>
        <option value="">-- Pilih Satuan --</option>
        @foreach($satuans as $satuan)
            <option value="{{ $satuan->id }}">{{ $satuan->nama_satuan }}</option>
        @endforeach
    </select>
    </div>
    <div class="flex gap-2">
        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Simpan</button>
        <a href="{{ route('barang.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Batal</a>
    </div>
</form>
@endsection