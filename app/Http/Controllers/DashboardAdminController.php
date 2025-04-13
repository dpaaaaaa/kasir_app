<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\Produk;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalPelanggan = Pelanggan::count();
        $totalPenjualan = Penjualan::count();
        $totalProduk = Produk::count();
        $totalPendapatan = Penjualan::sum('total_harga') ?? 0;

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalPelanggan',
            'totalPenjualan',
            'totalProduk',
            'totalPendapatan'
        ));
    }
}
