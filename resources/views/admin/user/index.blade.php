@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">📋 Daftar Karyawan</h2>

    @if(auth()->user()->hasRole('Admin'))
        <a href="{{ route('user.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
            + Tambah User
        </a>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-indigo-500 text-white">
                    <th class="py-3 px-4 text-left border border-gray-300">ID</th>
                    <th class="py-3 px-4 text-left border border-gray-300">Nama</th>
                    <th class="py-3 px-4 text-left border border-gray-300">Email</th>
                    <th class="py-3 px-4 text-left border border-gray-300">Role</th>
                    @if(auth()->user()->hasRole('Admin'))
                        <th class="py-3 px-4 text-center border border-gray-300">Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="border border-gray-300 hover:bg-gray-100">
                    <td class="py-3 px-4 border border-gray-300">{{ $user->id }}</td>
                    <td class="py-3 px-4 border border-gray-300">{{ $user->name }}</td>
                    <td class="py-3 px-4 border border-gray-300">{{ $user->email }}</td>
                    <td class="py-3 px-4 border border-gray-300">
                        <span class="bg-green-500 text-white py-1 px-3 rounded-full text-xs">
                            {{ $user->roles->pluck('name')->implode(', ') }}
                        </span>
                    </td>
                    @if(auth()->user()->hasRole('Admin'))
                    <td class="py-3 px-4 border border-gray-300 text-center">
                        <a href="{{ route('user.edit', $user->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded text-xs">
                            ✏ Edit
                        </a>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded text-xs"
                                onclick="return confirm('Yakin ingin menghapus?')">
                                ❌ Hapus
                            </button>
                        </form>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
