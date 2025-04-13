<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller {
    public function index() {
        $produks = Produk::all();
        return view('admin.produk.index', compact('produks'));
    }

    public function create() {
        return view('admin.produk.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'stock' => 'required|integer'
        ]);

            Produk::create($request->all());
            return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id) {
        $produk = Produk::findOrFail($id);
        return view('admin.produk.edit', compact('produk'));
    }

    public function update(Request $request, $id) {
        $produk = Produk::findOrFail($id);
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'stock' => 'required|integer'
        ]);

        $produk->update($request->all());
        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id) {
        Produk::findOrFail($id)->delete();
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}

