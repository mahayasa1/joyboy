@extends('layouts.app')

@section('title', 'Laporan Barang Masuk')
@section('page_title','Laporan Barang Masuk')

@section('content')
<div class="bg-white shadow rounded-lg p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-gray-700">Laporan Barang Masuk</h2>

        <div class="flex gap-2">
            <a href="#"
                class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg shadow">
                <i class="fa fa-file-excel mr-2"></i> Export Excel
            </a>

            <a href="#"
                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow">
                <i class="fa fa-file-pdf mr-2"></i> Cetak PDF
            </a>
        </div>
    </div>

    <table class="w-full border border-gray-300 text-sm text-gray-700">
        <thead class="bg-yellow-400 text-white">
            <tr>
                <th class="py-2 px-3 border">No</th>
                <th class="py-2 px-3 border">Kode Barang</th>
                <th class="py-2 px-3 border">Nama Barang</th>
                <th class="py-2 px-3 border">Satuan</th>
                <th class="py-2 px-3 border">Jumlah Masuk</th>
                <th class="py-2 px-3 border">Tanggal Masuk</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($laporan as $index => $item)
                <tr class="text-center hover:bg-gray-50">
                    <td class="border py-2">{{ $index + 1 }}</td>
                    <td class="border py-2">{{ $item->barang->kode_barang ?? '-' }}</td>
                    <td class="border py-2">{{ $item->barang->nama_barang ?? '-' }}</td>
                    <td class="border py-2">{{ $item->barang->satuan->nama_satuan ?? '-' }}</td>
                    <td class="border py-2 text-green-600 font-semibold">{{ $item->jumlah_masuk }}</td>
                    <td class="border py-2">{{ $item->tanggal_masuk }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-gray-500 py-3">Tidak ada data barang masuk.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
