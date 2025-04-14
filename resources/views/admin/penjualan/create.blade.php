@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg relative">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">➕ Tambah Penjualan</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- FORM INPUT --}}
    <form action="{{ route('penjualan.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="user_id" class="block text-sm font-medium text-gray-700 mb-1">User</label>
            <select name="user_id" id="user_id" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
                <option value="">-- Pilih User --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="tanggal_penjualan" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Penjualan</label>
            <input type="date" name="tanggal_penjualan" id="tanggal_penjualan"
                value="{{ old('tanggal_penjualan') }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="total_harga" class="block text-sm font-medium text-gray-700 mb-1">Total Harga</label>
            <input type="number" name="total_harga" id="total_harga"
                value="{{ old('total_harga') }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-6">
            <label for="pelanggan_id" class="block text-sm font-medium text-gray-700 mb-1">Pelanggan</label>
            <select name="pelanggan_id" id="pelanggan_id" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
                <option value="">-- Pilih Pelanggan --</option>
                @foreach($pelanggans as $pelanggan)
                    <option value="{{ $pelanggan->id }}" {{ old('pelanggan_id') == $pelanggan->id ? 'selected' : '' }}>
                        {{ $pelanggan->nama_pelanggan }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('penjualan.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded mr-2">
                Batal
            </a>
            <button type="submit"
                    class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">
                Simpan
            </button>
        </div>
    </form>

    {{-- MODAL STRUK --}}
    @if(session('penjualan'))
        @php
            $diskon = session('diskon') ?? 0;
            $totalAwal = session('penjualan')->total_harga / (1 - ($diskon / 100));
        @endphp

        <div id="modal-struk" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded shadow-lg w-[350px] relative">
                <h3 class="text-lg font-bold text-center mb-4 border-b pb-2">🧾 Struk Penjualan</h3>

                <div class="text-sm text-gray-700 space-y-1 font-mono">
                    <p><strong>ID Penjualan:</strong> {{ session('penjualan')->id }}</p>
                    <p><strong>User ID:</strong> {{ session('penjualan')->user_id }}</p>
                    <p><strong>Tanggal:</strong> {{ session('penjualan')->tanggal_penjualan }}</p>
                    <p><strong>Total Awal:</strong> Rp {{ number_format($totalAwal, 2, ',', '.') }}</p>
                    <p><strong>Diskon:</strong> {{ $diskon }}%</p>
                    <p><strong>Total Bayar:</strong> Rp {{ number_format(session('penjualan')->total_harga, 2, ',', '.') }}</p>
                    <p><strong>Pelanggan ID:</strong> {{ session('penjualan')->pelanggan_id }}</p>
                </div>

                <div class="mt-4 text-center">
                    <a href="{{ route('penjualan.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">
                        ✔ Selesai
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
