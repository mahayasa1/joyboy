@extends('layouts.app')

@section('content')
<div class="p-6 bg-white shadow rounded">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold">Manajemen User</h2>
        <a href="{{ route('user.create') }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">+ Tambah User</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border-collapse border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-3 py-2 text-left">No</th>
                <th class="border px-3 py-2 text-left">Username</th>
                <th class="border px-3 py-2 text-left">Nama Lengkap</th>
                <th class="border px-3 py-2 text-left">Role</th>
                <th class="border px-3 py-2 text-center w-40">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
            <tr>
                <td class="border px-3 py-2">{{ $loop->iteration }}</td>
                <td class="border px-3 py-2">{{ $user->username }}</td>
                <td class="border px-3 py-2">{{ $user->nama_lengkap }}</td>
                <td class="border px-3 py-2">{{ ucfirst($user->role) }}</td>
                <td class="border px-3 py-2 text-center">
                    <a href="{{ route('user.edit', $user->id) }}" class="text-blue-500 hover:underline">Edit</a> |
                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus user ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center p-3">Belum ada user.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
