@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">🛍️ Daftar Pelanggan</h2>

    <a href="{{ route('pelanggan.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
        + Tambah Pelanggan
    </a>

    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-indigo-500 text-white">
                    <th class="py-3 px-4 text-left border border-gray-300">ID</th>
                    <th class="py-3 px-4 text-left border border-gray-300">Nama Pelanggan</th>
                    <th class="py-3 px-4 text-left border border-gray-300">Alamat</th>
                    <th class="py-3 px-4 text-left border border-gray-300">Nomor Telepon</th>
                    <th class="py-3 px-4 text-center border border-gray-300">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pelanggans as $pelanggan)
                <tr class="border border-gray-300 hover:bg-gray-100">
                    <td class="py-3 px-4 border border-gray-300">{{ $pelanggan->id }}</td>
                    <td class="py-3 px-4 border border-gray-300">{{ $pelanggan->nama_pelanggan }}</td>
                    <td class="py-3 px-4 border border-gray-300">{{ $pelanggan->alamat }}</td>
                    <td class="py-3 px-4 border border-gray-300">{{ $pelanggan->nomor_telepon }}</td>
                    <td class="py-3 px-4 border border-gray-300 text-center">
                        <a href="{{ route('pelanggan.edit', $pelanggan->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded text-xs">
                            ✏ Edit
                        </a>
                        <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded text-xs" onclick="return confirm('Yakin ingin menghapus?')">
                                ❌ Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-gray-500 py-4">Belum ada data pelanggan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
