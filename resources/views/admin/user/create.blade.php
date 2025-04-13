@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold mb-6">Tambah Karyawan</h2>

        <form action="{{ route('users.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <label class="block mb-2">Nama:</label>
            <input type="text" name="name" class="w-full border px-3 py-2 rounded-lg mb-4" required>

            <label class="block mb-2">Email:</label>
            <input type="email" name="email" class="w-full border px-3 py-2 rounded-lg mb-4" required>

            <label class="block mb-2">Password:</label>
            <input type="password" name="password" class="w-full border px-3 py-2 rounded-lg mb-4" required>

            <label class="block mb-2">Role:</label>
            <select name="role" class="w-full border px-3 py-2 rounded-lg mb-4">
                @foreach($roles as $role)
                    <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                @endforeach
            </select>

            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Simpan</button>
        </form>
    </div>
@endsection
