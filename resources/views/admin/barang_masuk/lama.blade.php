@extends('layouts.app')

@section('title', 'Barang Masuk')
@section('page_title','Barang Masuk')

@section('content')
<div class="bg-white shadow rounded-lg p-6 max-w-3xl mx-auto">
    <h2 class="text-2xl font-bold text-gray-700 mb-6">Entri Barang Lama</h2>

    <form action="{{ route('barang_masuk.store') }}" method="POST">
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
                            data-satuan="{{ $item->satuan->nama_satuan ?? '-' }}">
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

            {{-- Stok Sebelumnya --}}
            <div>
                <label class="block text-gray-700">Stok Sebelumnya</label>
                <input readonly type="number" id="stokSebelumnya" class="w-full border rounded px-3 py-2 bg-gray-100" placeholder="0">
            </div>

            {{-- Jumlah Masuk --}}
            <div>
                <label class="block text-gray-700">Jumlah Masuk*</label>
                <input type="number" name="jumlah_masuk" class="w-full border rounded px-3 py-2" placeholder="0" required>
            </div>

            {{-- Tanggal Masuk --}}
            <div>
                <label class="block text-gray-700">Tanggal*</label>
                <input type="date" name="tanggal_masuk" class="w-full border rounded px-3 py-2" required>
            </div>

            {{-- Satuan (readonly) --}}
            <div>
                <label class="block text-gray-700">Satuan</label>
                <input readonly type="text" id="satuanBarang" class="w-full border rounded px-3 py-2 bg-gray-100" placeholder="-">
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
    const stokSebelumnyaInput = document.getElementById('stokSebelumnya');
    const satuanInput = document.getElementById('satuanBarang');

    select.addEventListener('change', function() {
        const selected = this.options[this.selectedIndex];
        const kode = selected.getAttribute('data-kode');
        const stok = selected.getAttribute('data-stok');
        const satuan = selected.getAttribute('data-satuan');

        kodeBarangInput.value = kode || '';
        stokSebelumnyaInput.value = stok || 0;
        satuanInput.value = satuan || '-';
    });
</script>
@endsection
