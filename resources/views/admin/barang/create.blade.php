@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-center mt-10">
    <h2 class="text-3xl font-bold text-gray-700 mb-6">Pilih Jenis Barang Masuk</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full max-w-2xl">
        <!-- Barang Lama -->
        <a href="{{ route('barang_masuk.lama') }}" 
           class="flex flex-col items-center justify-center bg-yellow-400 hover:bg-yellow-500 text-white font-semibold py-10 rounded-2xl shadow-lg transition-all">
            <i class="fas fa-box-open text-5xl mb-4"></i>
            <span class="text-2xl">Barang Lama</span>
            <p class="text-sm mt-2 text-white/90">Tambahkan stok barang yang sudah ada</p>
        </a>

        <!-- Barang Baru -->
        <a href="{{ route('barang_masuk.baru') }}" 
           class="flex flex-col items-center justify-center bg-green-500 hover:bg-green-600 text-white font-semibold py-10 rounded-2xl shadow-lg transition-all">
            <i class="fas fa-plus-circle text-5xl mb-4"></i>
            <span class="text-2xl">Barang Baru</span>
            <p class="text-sm mt-2 text-white/90">Masukkan data barang yang belum ada</p>
        </a>
    </div>
</div>
@endsection
