<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\User;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualans = Penjualan::all();
        return view('admin.penjualan.index', compact('penjualans'));
    }

    public function create()
    {
        $users = User::all();
        $pelanggans = Pelanggan::all();
        return view('admin.penjualan.create', compact('users', 'pelanggans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'tanggal_penjualan' => 'required|date',
            'total_harga' => 'required|numeric',
            'pelanggan_id' => 'required|exists:pelanggans,id',
        ]);

        Penjualan::create($request->all());
        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil ditambahkan');
    }

    public function show(Penjualan $penjualan)
    {
        return view('admin.penjualan.show', compact('penjualan'));
    }

    public function edit(Penjualan $penjualan)
    {
        $users = User::all();
        $pelanggans = Pelanggan::all();
        return view('admin.penjualan.edit', compact('penjualan', 'users', 'pelanggans'));
    }

    public function update(Request $request, Penjualan $penjualan)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'tanggal_penjualan' => 'required|date',
            'total_harga' => 'required|numeric',
            'pelanggan_id' => 'required|exists:pelanggans,id',
        ]);

        $penjualan->update($request->all());
        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil ditambahkan');
    }

    public function destroy(Penjualan $penjualan)
    {
        $penjualan->delete();
        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil dihapus');
    }
}
