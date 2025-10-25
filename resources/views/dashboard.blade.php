@extends('layouts.app')

@section('content')
<!-- Kotak Statistik Besar -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
        <i class="fa fa-box text-yellow-500 text-3xl mb-2"></i>
        <h3 class="text-2xl font-bold">99</h3>
        <p class="text-gray-600">Data Barang</p>
    </div>
    <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
        <i class="fa fa-sign-in-alt text-yellow-500 text-3xl mb-2"></i>
        <h3 class="text-2xl font-bold">99</h3>
        <p class="text-gray-600">Barang Masuk</p>
    </div>
    <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
        <i class="fa fa-sign-out-alt text-yellow-500 text-3xl mb-2"></i>
        <h3 class="text-2xl font-bold">99</h3>
        <p class="text-gray-600">Barang Keluar</p>
    </div>
</div>

<!-- Kotak Statistik Kecil -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    <div class="bg-yellow-100 rounded-lg p-4 text-center shadow">
        <h3 class="text-xl font-bold text-yellow-600">99</h3>
        <p class="text-gray-700">Data Jenis Barang</p>
    </div>
    <div class="bg-yellow-100 rounded-lg p-4 text-center shadow">
        <h3 class="text-xl font-bold text-yellow-600">99</h3>
        <p class="text-gray-700">Data Satuan</p>
    </div>
    <div class="bg-yellow-100 rounded-lg p-4 text-center shadow">
        <h3 class="text-xl font-bold text-yellow-600">99</h3>
        <p class="text-gray-700">Data User</p>
    </div>
</div>

<!-- Tabel Data Barang -->
<div class="bg-white rounded-lg shadow p-4">
    <table class="min-w-full text-left">
        <thead>
            <tr class="border-b">
                <th class="p-2">No.</th>
                <th class="p-2">ID Barang</th>
                <th class="p-2">Nama Barang</th>
                <th class="p-2">Stok</th>
                <th class="p-2">Satuan</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b hover:bg-gray-50">
                <td class="p-2">1</td>
                <td class="p-2">BC001</td>
                <td class="p-2">Piatos Sapi Panggang</td>
                <td class="p-2">13</td>
                <td class="p-2">Pcs</td>
            </tr>
            <tr class="border-b hover:bg-gray-50">
                <td class="p-2">2</td>
                <td class="p-2">BC002</td>
                <td class="p-2">Piatos Seaweed</td>
                <td class="p-2">15</td>
                <td class="p-2">Pcs</td>
            </tr>
            <tr class="hover:bg-gray-50">
                <td class="p-2">3</td>
                <td class="p-2">BC003</td>
                <td class="p-2">Chitato Original</td>
                <td class="p-2">15</td>
                <td class="p-2">Pcs</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
