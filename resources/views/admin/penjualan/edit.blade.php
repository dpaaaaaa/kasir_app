@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">✏️ Edit Produk</h2>

    <form action="{{ route('produk.update', $produk->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nama_produk" class="block text-sm font-medium text-gray-700 mb-1">Nama Produk</label>
            <input type="text" name="nama_produk" id="nama_produk"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-200"
                value="{{ old('nama_produk', $produk->nama_produk) }}" required>
        </div>

        <div class="mb-4">
            <label for="harga" class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
            <input type="number" name="harga" id="harga" step="0.01"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-200"
                value="{{ old('harga', $produk->harga) }}" required>
        </div>

        <div class="mb-6">
            <label for="stock" class="block text-sm font-medium text-gray-700 mb-1">Stok</label>
            <input type="number" name="stock" id="stock"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-200"
                value="{{ old('stock', $produk->stock) }}" required>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('produk.index') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded mr-2">
                Batal
            </a>
            <button type="submit"
                class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">
                Perbarui
            </button>
        </div>
    </form>
</div>
@endsection
