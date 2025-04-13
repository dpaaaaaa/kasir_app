@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">📦 Daftar Detail Penjualan</h2>

    <a href="{{ route('detailpenjualan.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
        + Tambah Detail Penjualan
    </a>

    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-indigo-500 text-white">
                    <th class="py-3 px-4 text-left border border-gray-300">ID</th>
                    <th class="py-3 px-4 text-left border border-gray-300">ID Penjualan</th>
                    <th class="py-3 px-4 text-left border border-gray-300">ID Produk</th>
                    <th class="py-3 px-4 text-left border border-gray-300">Jumlah Produk</th>
                    <th class="py-3 px-4 text-left border border-gray-300">Subtotal</th>
                    <th class="py-3 px-4 text-center border border-gray-300">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($detailPenjualans as $detail)
                <tr class="border border-gray-300 hover:bg-gray-100">
                    <td class="py-3 px-4 border border-gray-300">{{ $detail->id }}</td>
                    <td class="py-3 px-4 border border-gray-300">{{ $detail->penjualan_id }}</td>
                    <td class="py-3 px-4 border border-gray-300">{{ $detail->produk_id }}</td>
                    <td class="py-3 px-4 border border-gray-300">{{ $detail->jumlah_produk }}</td>
                    <td class="py-3 px-4 border border-gray-300">Rp {{ number_format($detail->subtotal, 2, ',', '.') }}</td>
                    <td class="py-3 px-4 border border-gray-300 text-center">
                        <a href="{{ route('detailpenjualan.edit', $detail->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded text-xs">
                            ✏ Edit
                        </a>
                        <form action="{{ route('detailpenjualan.destroy', $detail->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded text-xs"
                                onclick="return confirm('Yakin ingin menghapus?')">
                                ❌ Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-gray-500 py-4">Belum ada data detail penjualan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
