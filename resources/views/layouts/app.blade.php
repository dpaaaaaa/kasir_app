<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="flex min-h-screen">

        {{-- Tambahkan ini di layout utama bagian <head> --}}
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Inter', sans-serif;
    }
</style>

{{-- Sidebar --}}
<aside class="w-64 bg-white shadow-lg p-6 rounded-xl h-screen">
    <h2 class="text-xl font-bold text-gray-700 mb-6 border-b pb-2">Menu</h2>

    @php
        $routeName = Route::currentRouteName();
    @endphp

    <nav class="space-y-3">
        <a href="{{ route('dashboard') }}"
           class="block px-4 py-2 rounded-md font-medium transition
           {{ $routeName === 'dashboard' ? 'bg-gray-100 text-black font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">
           Dashboard
        </a>

        <a href="{{ route('user.index') }}"
           class="block px-4 py-2 rounded-md font-medium transition
           {{ $routeName === 'user.index' ? 'bg-gray-100 text-black font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">
           Kelola Petugas
        </a>

        <a href="{{ route('pelanggan.index') }}"
           class="block px-4 py-2 rounded-md font-medium transition
           {{ $routeName === 'pelanggan.index' ? 'bg-gray-100 text-black font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">
           Pendataan Pelanggan
        </a>

        <a href="{{ route('produk.index') }}"
           class="block px-4 py-2 rounded-md font-medium transition
           {{ $routeName === 'produk.index' ? 'bg-gray-100 text-black font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">
           Stok Barang
        </a>

        <a href="{{ route('penjualan.index') }}"
           class="block px-4 py-2 rounded-md font-medium transition
           {{ $routeName === 'penjualan.index' ? 'bg-gray-100 text-black font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">
           Penjualan
        </a>

        <a href="{{ route('detailpenjualan.index') }}"
           class="block px-4 py-2 rounded-md font-medium transition
           {{ $routeName === 'detailpenjualan.index' ? 'bg-gray-100 text-black font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">
           Laporan Penjualan
        </a>
    </nav>

    {{-- Logout --}}
    <form method="POST" action="{{ route('logout') }}" class="pt-4 border-t mt-6">
        @csrf
        <button type="submit"
                class="w-full text-left px-4 py-2 rounded-md bg-red-500 text-white font-semibold hover:bg-red-600 transition">
            🚪 Logout
        </button>
    </form>
</aside>


        {{-- Konten Utama --}}
        <main class="flex-1 p-6 bg-gray-100">
            @yield('content')
        </main>

    </div>
</body>
</html>
