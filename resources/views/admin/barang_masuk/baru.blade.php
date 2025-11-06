@extends('layouts.app')

@section('title', 'Barang Masuk')
@section('page_title','Barang Masuk')

@section('content')
<div class="bg-white shadow rounded-lg p-6 max-w-3xl mx-auto">
    <h2 class="text-2xl font-bold text-gray-700 mb-6">Entri Barang Baru</h2>

    <form action="{{ route('barang_masuk.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <div>
                <label class="block text-gray-700">Kode Barang*</label>
                <input readonly type="text" name="kode_barang" value="{{ $nextKode }}" class="w-full border rounded px-3 py-2 bg-gray-100">
            </div>

            <div>
                <label class="block text-gray-700">Tanggal*</label>
                <input type="date" name="tanggal_masuk" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-gray-700">Nama Barang*</label>
                <input type="text" name="nama_barang" class="w-full border rounded px-3 py-2" placeholder="Contoh: Boneka Anabel" required>
            </div>

            <div>
                <label class="block text-gray-700">Jumlah Stok*</label>
                <input type="number" name="jumlah_masuk" class="w-full border rounded px-3 py-2" placeholder="0" required>
            </div>

            <div class="md:col-span-2">
                <label class="block text-gray-700">Satuan*</label>
                <select name="satuan_id" class="w-full border rounded px-3 py-2" required>
                    <option value="">-- Pilih Satuan --</option>
                    @foreach($satuans as $satuan)
                        <option value="{{ $satuan->id }}">{{ $satuan->nama_satuan }}</option>
                    @endforeach
                </select>
            </div>

        </div>

        <div class="flex gap-3 mt-6">
            <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded">Simpan</button>
            <a href="{{ route('barang.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-6 py-2 rounded">Batal</a>
        </div>
    </form>
</div>
@endsection
