@extends('layouts.app')

@section('title', 'User')
@section('page_title', 'User')

@section('content')
<div class="p-6 bg-white shadow rounded">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold">Edit User</h2>
        <a href="{{ route('user.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">
            <i class="fa fa-arrow-left"></i> Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc pl-6">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('user.update', $user->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="username" class="block font-medium text-gray-700 mb-1">Username</label>
            <input type="text" name="username" id="username" value="{{ old('username', $user->username) }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                   required>
        </div>

        <div>
            <label for="nama_lengkap" class="block font-medium text-gray-700 mb-1">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap', $user->nama_lengkap) }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                   required>
        </div>

        <div>
            <label for="password" class="block font-medium text-gray-700 mb-1">Password (Kosongkan jika tidak diubah)</label>
            <input type="password" name="password" id="password"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400">
        </div>

        <div>
            <label for="role" class="block font-medium text-gray-700 mb-1">Role</label>
            <select name="role" id="role"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    required>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="petugas" {{ $user->role == 'petugas' ? 'selected' : '' }}>Petugas</option>
            </select>
        </div>

        <div class="pt-4">
            <button type="submit"
                    class="bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
