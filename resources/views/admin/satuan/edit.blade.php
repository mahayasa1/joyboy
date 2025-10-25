@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-md mt-10">
    <h2 class="text-2xl font-bold text-gray-700 mb-6 text-center">Edit Barang</h2>

    <form action="{{ route('barang.update', $barang->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Kode Barang --}}
        <div>
            <label class="block text-gray-700 font-medium mb-2">Kode Barang</label>
            <input readonly type="text" name="kode_barang" value="{{ old('kode_barang', $barang->kode_barang) }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-yellow-400 focus:outline-none bg-gray-100 cursor-not-allowed">
        </div>

        {{-- Nama Barang --}}
        <div>
            <label class="block text-gray-700 font-medium mb-2">Nama Barang</label>
            <input type="text" name="nama_barang" value="{{ old('nama_barang', $barang->nama_barang) }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-yellow-400 focus:outline-none"
                required>
        </div>

        {{-- Stok --}}
        <div>
            <label class="block text-gray-700 font-medium mb-2">Stok</label>
            <input type="number" name="stok" value="{{ old('stok', $barang->stok) }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-yellow-400 focus:outline-none"
                required>
        </div>

        {{-- Satuan --}}
        <div>
            <label class="block text-gray-700 font-medium mb-2">Satuan</label>
            <select name="satuan_id"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-yellow-400 focus:outline-none"
                required>
                <option value="">-- Pilih Satuan --</option>
                @foreach ($satuans as $satuan)
                    <option value="{{ $satuan->id }}" {{ $barang->satuan_id == $satuan->id ? 'selected' : '' }}>
                        {{ $satuan->nama_satuan }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Tombol --}}
        <div class="flex items-center gap-3 pt-3">
            <button type="submit"
                class="px-5 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition font-medium">
                Simpan
            </button>
            <a href="{{ route('barang.index') }}"
                class="px-5 py-2 bg-gray-400 text-white rounded hover:bg-gray-500 transition font-medium">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
