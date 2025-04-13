@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">👋 Selamat Datang, Petugas</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white p-5 rounded-lg shadow border">
            <h5 class="text-lg text-gray-600">📦 Produk</h5>
            <p class="text-sm text-gray-500">Lihat dan kelola daftar produk.</p>
        </div>

        <div class="bg-white p-5 rounded-lg shadow border">
            <h5 class="text-lg text-gray-600">🧾 Penjualan</h5>
            <p class="text-sm text-gray-500">Kelola data transaksi penjualan.</p>
        </div>

        <div class="bg-white p-5 rounded-lg shadow border">
            <h5 class="text-lg text-gray-600">👤 Pelanggan</h5>
            <p class="text-sm text-gray-500">Kelola data pelanggan toko.</p>
        </div>
    </div>
</div>
@endsection
