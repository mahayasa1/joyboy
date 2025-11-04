@extends('layouts.app')

@section('content')
<div class="bg-white shadow rounded-lg p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-gray-700">Laporan Stok Barang</h2>

        <div class="flex gap-2">
            <a href="{{ route('laporan-stok.exportExcel') }}"
                class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg shadow">
                <i class="fa fa-file-excel mr-2"></i> Export Excel
            </a>

            <a href="{{ route('laporan-stok.exportPdf') }}"
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
                <th class="py-2 px-3 border">Stok Awal</th>
                <th class="py-2 px-3 border">Masuk</th>
                <th class="py-2 px-3 border">Keluar</th>
                <th class="py-2 px-3 border">Stok Akhir</th>
                <th class="py-2 px-3 border">Periode</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($laporan as $index => $item)
                <tr class="text-center hover:bg-gray-50">
                    <td class="border py-2">{{ $index + 1 }}</td>
                    <td class="border py-2">{{ $item->kode_barang }}</td>
                    <td class="border py-2">{{ $item->nama_barang }}</td>
                    <td class="border py-2">{{ $item->satuan->nama_satuan ?? '-' }}</td>
                    <td class="border py-2">{{ $item->stok_awal }}</td>
                    <td class="border py-2 text-green-600 font-semibold">{{ $item->totalMasuk }}</td>
                    <td class="border py-2 text-red-600 font-semibold">{{ $item->totalKeluar }}</td>
                    <td class="border py-2 font-bold">{{ $item->stok_akhir }}</td>
                    <td class="border py-2">{{ $item->periode }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center text-gray-500 py-3">Tidak ada data laporan stok.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
