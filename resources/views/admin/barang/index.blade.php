@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h2 class="text-2xl font-bold text-gray-700">Data Barang</h2>
    {{-- <a href="{{ route('barang.create') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
        + Tambah Barang
    </a> --}}
</div>

@if(session('success'))
<div class="bg-green-100 text-green-700 p-2 rounded mb-4">
    {{ session('success') }}
</div>
@endif

<div class="bg-white shadow rounded-lg overflow-hidden">
    <table class="min-w-full text-left border">
        <thead class="bg-yellow-400 text-white">
            <tr>
                <th class="px-4 py-2">No</th>
                <th class="px-4 py-2">Kode Barang</th>
                <th class="px-4 py-2">Nama Barang</th>
                <th class="px-4 py-2">Stok</th>
                <th class="px-4 py-2">Satuan</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($barang as $b)
        <tr class="border-b hover:bg-gray-50">
            <td class="px-4 py-2">{{ $loop->iteration }}</td>
            <td class="px-4 py-2">{{ $b->kode_barang }}</td>
            <td class="px-4 py-2">{{ $b->nama_barang }}</td>
            <td class="px-4 py-2">{{ $b->stok }}</td>
            <td class="px-4 py-2">{{ $b->satuan->nama_satuan ?? '-' }}</td>
            <td class="px-4 py-2 flex gap-2">
            <a href="{{ route('barang.edit', $b->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Edit</a>
            <form action="{{ route('barang.destroy', $b->id) }}" method="POST" onsubmit="return confirm('Yakin hapus barang ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Hapus</button>
            </form>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
</div>
@endsection
