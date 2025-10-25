@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h2 class="text-2xl font-bold text-gray-700">Data Satuan</h2>
    <a href="{{ route('satuan.create') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
        + Tambah Satuan
    </a>
</div>

@if(session('success'))
<div class="bg-green-100 text-green-700 p-2 rounded mb-4">
    {{ session('success') }}
</div>
@endif

<div class="bg-white shadow rounded-lg overflow-hidden">
    <table class="min-w-full border border-gray-300 text-sm">
        <thead class="bg-yellow-400 text-white">
            <tr>
                <th class="px-4 py-2 text-left w-16">No</th>
                <th class="px-4 py-2 text-center">Nama Satuan</th>
                <th class="px-4 py-2 text-left w-48">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($satuan as $s)
            <tr class="border-b hover:bg-gray-50">
                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                <td class="px-4 py-2 text-center font-medium text-gray-700">{{ $s->nama_satuan }}</td>
                <td class="px-4 py-2">
                    <div class="flex gap-2">
                        <a href="{{ route('satuan.edit', $s->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition">Edit</a>
                        <form action="{{ route('satuan.destroy', $s->id) }}" method="POST" onsubmit="return confirm('Yakin hapus satuan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
