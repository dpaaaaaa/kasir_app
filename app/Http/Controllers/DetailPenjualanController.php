<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use App\Models\Produk;

class DetailPenjualanController extends Controller {
    public function index() {
        $detailPenjualans = DetailPenjualan::with(['penjualan', 'produk'])->get();
        return view('admin.detailpenjualan.index', compact('detailPenjualans'));
    }

    public function create() {
        $penjualans = Penjualan::all();
        $produks = Produk::all();
        return view('admin.detailpenjualan.create', compact('penjualans', 'produks'));
    }

    public function store(Request $request) {
        $request->validate([
            'penjualan_id' => 'required|exists:penjualans,id',
            'produk_id' => 'required|exists:produks,id',
            'jumlah_produk' => 'required|integer|min:1',
            'subtotal' => 'required|numeric|min:0',
        ]);

        DetailPenjualan::create($request->all());

        return redirect()->route('admin.detailpenjualan.index')->with('success', 'Detail penjualan berhasil ditambahkan.');
    }

    public function edit($id) {
        $detailPenjualans = DetailPenjualan::findOrFail($id);
        $penjualans = Penjualan::all();
        $produks = Produk::all();
        return view('admin.detailpenjualan.edit', compact('detailPenjualan', 'penjualans', 'produks'));
    }

    public function update(Request $request, $id) {
        $detailPenjualans = DetailPenjualan::findOrFail($id);

        $request->validate([
            'penjualan_id' => 'required|exists:penjualans,id',
            'produk_id' => 'required|exists:produks,id',
            'jumlah_produk' => 'required|integer|min:1',
            'subtotal' => 'required|numeric|min:0',
        ]);

        $detailPenjualans->update($request->all());

        return redirect()->route('admin.detailpenjualan.index')->with('success', 'Detail penjualan berhasil diperbarui.');
    }

    public function destroy($id) {
        DetailPenjualan::findOrFail($id)->delete();
        return redirect()->route('admin.detailpenjualan.index')->with('success', 'Detail penjualan berhasil dihapus.');
    }
}

