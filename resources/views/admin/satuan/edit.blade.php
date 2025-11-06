@extends('layouts.app')

@section('title', 'Satuan')
@section('page_title','Satuan')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-md mt-10">
    <h2 class="text-2xl font-bold text-gray-700 mb-6 text-center">Edit Satuan</h2>

    <form action="{{ route('satuan.update', $satuan->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        {{-- Satuan --}}
        <div>
            <label class="block text-gray-700 font-medium mb-2">Satuan</label>
            <input type="text" name="nama_satuan" value="{{ old('nama_satuan', $satuan->nama_satuan) }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-yellow-400 focus:outline-none"
                required>
        </div>

        {{-- Tombol --}}
        <div class="flex items-center gap-3 pt-3">
            <button type="submit"
                class="px-5 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition font-medium">
                Simpan
            </button>
            <a href="{{ route('satuan.index') }}"
                class="px-5 py-2 bg-gray-400 text-white rounded hover:bg-gray-500 transition font-medium">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
