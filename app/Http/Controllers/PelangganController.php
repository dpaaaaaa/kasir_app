<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller {

    public function index() {
        $pelanggans = Pelanggan::all();
        return view('admin.pelanggan.index', compact('pelanggans')); // ✅ Pastikan sesuai dengan struktur folder
    }

    public function create() {
        return view('admin.pelanggan.create'); // ✅ Pastikan sesuai dengan struktur folder
    }

    public function store(Request $request) {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
            'nomor_telepon' => 'required|string|max:15'
        ]);

        Pelanggan::create($request->only(['nama_pelanggan', 'alamat', 'nomor_telepon']));

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    public function edit(Pelanggan $pelanggan) { // 🔹 Gunakan parameter binding
        return view('admin.pelanggan.edit', compact('pelanggan')); // ✅ Pastikan sesuai dengan struktur folder
    }

    public function update(Request $request, Pelanggan $pelanggan) { // 🔹 Gunakan parameter binding
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
            'nomor_telepon' => 'required|string|max:15'
        ]);

        $pelanggan->update($request->only(['nama_pelanggan', 'alamat', 'nomor_telepon']));

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil diperbarui.');
    }

    public function destroy(Pelanggan $pelanggan) { // 🔹 Gunakan parameter binding
        $pelanggan->delete();

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus.');
    }
}
