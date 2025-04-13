@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">➕ Tambah Penjualan</h2>

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
</div>
@endsection
