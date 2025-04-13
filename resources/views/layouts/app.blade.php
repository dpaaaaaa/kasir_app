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

        {{-- Sidebar --}}
        <aside class="w-64 bg-white shadow-md p-6">
            <h2 class="text-lg font-semibold mb-4">Admin Panel</h2>
            <nav class="space-y-2">
                <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded hover:bg-gray-200">🏠 Dashboard</a>
                <a href="{{ route('user.index') }}" class="block px-3 py-2 rounded hover:bg-gray-200">Karyawan</a>
                <a href="{{ route('pelanggan.index') }}" class="block px-3 py-2 rounded hover:bg-gray-200">🛍️ Pelanggan</a>
                <a href="{{ route('produk.index') }}" class="block px-3 py-2 rounded hover:bg-gray-200">Stok Barang</a>
                <a href="{{ route('penjualan.index') }}" class="block px-3 py-2 rounded hover:bg-gray-200">💰 Penjualan</a>
                <a href="{{ route('detailpenjualan.index') }}" class="block px-3 py-2 rounded hover:bg-gray-200">📊 Detail Penjualan</a>

                {{-- Logout --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-3 py-2 mt-4 rounded bg-red-500 text-white hover:bg-red-600">
                        🚪 Logout
                    </button>
                </form>
            </nav>
        </aside>

        {{-- Konten Utama --}}
        <main class="flex-1 p-6 bg-gray-100">
            @yield('content')
        </main>

    </div>
</body>
</html>
