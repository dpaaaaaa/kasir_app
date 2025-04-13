@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">📦 Daftar Produk</h2>

    <a href="{{ route('produk.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
        + Tambah Produk
    </a>

    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-indigo-500 text-white">
                    <th class="py-3 px-4 text-left border border-gray-300">ID</th>
                    <th class="py-3 px-4 text-left border border-gray-300">Nama Produk</th>
                    <th class="py-3 px-4 text-left border border-gray-300">Harga</th>
                    <th class="py-3 px-4 text-left border border-gray-300">Stok</th>
                    <th class="py-3 px-4 text-center border border-gray-300">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($produks as $produk)
                <tr class="border border-gray-300 hover:bg-gray-100">
                    <td class="py-3 px-4 border border-gray-300">{{ $produk->id }}</td>
                    <td class="py-3 px-4 border border-gray-300">{{ $produk->nama_produk }}</td>
                    <td class="py-3 px-4 border border-gray-300">Rp {{ number_format($produk->harga, 2, ',', '.') }}</td>
                    <td class="py-3 px-4 border border-gray-300">{{ $produk->stock }}</td>
                    <td class="py-3 px-4 border border-gray-300 text-center">
                        <a href="{{ route('produk.edit', $produk->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded text-xs">
                            ✏ Edit
                        </a>
                        <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded text-xs"
                                onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                ❌ Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-gray-500 py-4">Belum ada data produk.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
