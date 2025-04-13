@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">✏ Edit Detail Penjualan</h2>

    <form action="{{ route('detailpenjualan.update', $detailPenjualan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="penjualan_id" class="block text-sm font-medium text-gray-700 mb-1">ID Penjualan</label>
            <select name="penjualan_id" id="penjualan_id" required class="w-full px-4 py-2 border border-gray-300 rounded-md">
                @foreach($penjualans as $penjualan)
                    <option value="{{ $penjualan->id }}" {{ $penjualan->id == $detailPenjualan->penjualan_id ? 'selected' : '' }}>
                        {{ $penjualan->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="produk_id" class="block text-sm font-medium text-gray-700 mb-1">ID Produk</label>
            <select name="produk_id" id="produk_id" required class="w-full px-4 py-2 border border-gray-300 rounded-md">
                @foreach($produks as $produk)
                    <option value="{{ $produk->id }}" {{ $produk->id == $detailPenjualan->produk_id ? 'selected' : '' }}>
                        {{ $produk->nama_produk }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="jumlah_produk" class="block text-sm font-medium text-gray-700 mb-1">Jumlah Produk</label>
            <input type="number" name="jumlah_produk" id="jumlah_produk" min="1" value="{{ $detailPenjualan->jumlah_produk }}" required class="w-full px-4 py-2 border border-gray-300 rounded-md">
        </div>

        <div class="mb-6">
            <label for="subtotal" class="block text-sm font-medium text-gray-700 mb-1">Subtotal</label>
            <input type="number" step="0.01" name="subtotal" id="subtotal" value="{{ $detailPenjualan->subtotal }}" required class="w-full px-4 py-2 border border-gray-300 rounded-md">
        </div>

        <div class="flex justify-end">
            <a href="{{ route('detailpenjualan.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded mr-2">Batal</a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Perbarui</button>
        </div>
    </form>
</div>
@endsection
