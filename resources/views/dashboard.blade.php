@extends('layouts.app')

@section('content')
<div class="grid grid-cols-3 gap-6 justify-items-center">
    <!-- Baris atas -->
    <div class="bg-white shadow-md rounded-2xl p-6 w-64 text-center">
        <div class="text-yellow-600 text-4xl mb-2">
            <i class="fas fa-box"></i>
        </div>
        <h2 class="text-2xl font-bold">{{ $total_barang }}</h2>
        <p class="text-gray-700">Data Barang</p>
    </div>

    <div class="bg-white shadow-md rounded-2xl p-6 w-64 text-center">
        <div class="text-yellow-500 text-4xl mb-2">
            <i class="fas fa-arrow-right-to-bracket"></i>
        </div>
        <h2 class="text-2xl font-bold">{{ $total_masuk }}</h2>
        <p class="text-gray-700">Barang Masuk</p>
    </div>

    <div class="bg-white shadow-md rounded-2xl p-6 w-64 text-center">
        <div class="text-yellow-500 text-4xl mb-2">
            <i class="fas fa-arrow-right-from-bracket"></i>
        </div>
        <h2 class="text-2xl font-bold">{{ $total_keluar }}</h2>
        <p class="text-gray-700">Barang Keluar</p>
    </div>
</div>

<!-- Baris bawah (di tengah antara kolom pertama dan kedua baris atas) -->
<div class="flex justify-center mt-6 space-x-16">
    <div class="bg-yellow-50 shadow rounded-xl p-5 w-56 text-center">
        <h2 class="text-2xl font-bold text-yellow-700">{{ $total_satuan }}</h2>
        <p class="text-gray-700">Data Satuan</p>
    </div>

    <div class="bg-yellow-50 shadow rounded-xl p-5 w-56 text-center">
        <h2 class="text-2xl font-bold text-yellow-700">{{ $total_user }}</h2>
        <p class="text-gray-700">Data User</p>
    </div>
</div>

@endsection
