@extends('layouts.app')

@section('title', 'Tambah Satuan')
@section('page_title','Satuan')

@section('breadcrumb')
<a href="{{ route('satuan.index') }}" class="hover:underline">Data Satuan</a>
<span class="mx-2">›</span>
<span class="text-white font-semibold">Tambah Satuan</span>
@endsection

@section('content')
<h2 class="text-2xl font-bold mb-4">Tambah Satuan</h2>

<form action="{{ route('satuan.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow rounded-lg p-6 space-y-4">
    @csrf
    <div>
        <label class="block text-gray-700">Nama Satuan</label>
        <input type="text" name="nama_satuan" class="w-full border rounded px-3 py-2" required>
    </div>
    <div class="flex gap-2">
        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Simpan</button>
        <a href="{{ route('satuan.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Batal</a>
    </div>
</form>
@endsection
