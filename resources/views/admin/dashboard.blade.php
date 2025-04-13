@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold mb-6">Dashboard Admin</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white p-5 rounded-lg shadow-md">
                <h5 class="text-lg text-gray-600">👤 Total Users</h5>
                <h3 class="text-2xl font-bold text-gray-800">{{ $totalUsers ?? 0 }}</h3>
            </div>

            <div class="bg-white p-5 rounded-lg shadow-md">
                <h5 class="text-lg text-gray-600">🛍️ Total Pelanggan</h5>
                <h3 class="text-2xl font-bold text-gray-800">{{ $totalPelanggan ?? 0 }}</h3>
            </div>

            <div class="bg-white p-5 rounded-lg shadow-md">
                <h5 class="text-lg text-gray-600">💰 Total Penjualan</h5>
                <h3 class="text-2xl font-bold text-gray-800">{{ $totalPenjualan ?? 0 }}</h3>
            </div>

            <div class="bg-white p-5 rounded-lg shadow-md">
                <h5 class="text-lg text-gray-600">📦 Total Produk</h5>
                <h3 class="text-2xl font-bold text-gray-800">{{ $totalProduk ?? 0 }}</h3>
            </div>

            <div class="bg-white p-5 rounded-lg shadow-md col-span-full">
                <h5 class="text-lg text-gray-600">📊 Total Pendapatan</h5>
                <h3 class="text-2xl font-bold text-gray-800">Rp {{ number_format($totalPendapatan ?? 0, 2, ',', '.') }}</h3>
            </div>
        </div>
    </div>
@endsection
