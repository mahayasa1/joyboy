@extends('layouts.app')

@section('title', 'Barang Keluar')
@section('page_title','Barang Keluar')

@section('content')
<div class="bg-white shadow rounded-lg p-6 max-w-3xl mx-auto">
    <h2 class="text-2xl font-bold text-gray-700 mb-6">Entri Barang Keluar</h2>

    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('barang_keluar.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            {{-- Pilih Barang --}}
            <div>
                <label class="block text-gray-700">Pilih Barang*</label>
                <select name="id_barang" id="barangSelect" class="w-full border rounded px-3 py-2" required>
                    <option value="">-- Pilih Barang --</option>
                    @foreach($barang as $item)
                        <option value="{{ $item->id }}" 
                            data-kode="{{ $item->kode_barang }}"
                            data-stok="{{ $item->stok }}"
                            data-satuan="{{ $item->satuan ? $item->satuan->nama_satuan : '-' }}">
                            {{ $item->nama_barang }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Kode Barang --}}
            <div>
                <label class="block text-gray-700">Kode Barang*</label>
                <input readonly type="text" id="kodeBarang" class="w-full border rounded px-3 py-2 bg-gray-100">
            </div>

            {{-- Stok Sekarang --}}
            <div>
                <label class="block text-gray-700">Stok Sekarang</label>
                <input readonly type="number" id="stokSekarang" class="w-full border rounded px-3 py-2 bg-gray-100" placeholder="0">
            </div>

            {{-- Jumlah Keluar --}}
            <div>
                <label class="block text-gray-700">Jumlah Keluar*</label>
                <input type="number" name="jumlah_keluar" class="w-full border rounded px-3 py-2" placeholder="0" required>
            </div>

            {{-- Satuan --}}
            <div>
                <label class="block text-gray-700">Satuan</label>
                <input readonly type="text" id="satuanBarang" class="w-full border rounded px-3 py-2 bg-gray-100">
            </div>

            {{-- Tanggal Keluar --}}
            <div>
                <label class="block text-gray-700">Tanggal*</label>
                <input type="date" name="tanggal_keluar" class="w-full border rounded px-3 py-2" required>
            </div>

        </div>

        <div class="flex gap-3 mt-6">
            <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded">Simpan</button>
            <a href="{{ route('barang.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-6 py-2 rounded">Batal</a>
        </div>
    </form>
</div>

{{-- Script untuk menampilkan kode barang, stok, dan satuan otomatis --}}
<script>
    const select = document.getElementById('barangSelect');
    const kodeBarangInput = document.getElementById('kodeBarang');
    const stokSekarangInput = document.getElementById('stokSekarang');
    const satuanBarangInput = document.getElementById('satuanBarang');

    select.addEventListener('change', function() {
        const selected = this.options[this.selectedIndex];
        const kode = selected.getAttribute('data-kode');
        const stok = selected.getAttribute('data-stok');
        const satuan = selected.getAttribute('data-satuan');

        kodeBarangInput.value = kode || '';
        stokSekarangInput.value = stok || 0;
        satuanBarangInput.value = satuan || '';
    });
</script>
@endsection
