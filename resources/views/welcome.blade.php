@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>Dashboard Admin</h2>

    <div class="row">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5>Total Users</h5>
                    <h3>{{ $totalUsers ?? 0 }}</h3> {{-- Gunakan ?? 0 agar tidak error --}}
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5>Total Pelanggan</h5>
                    <h3>{{ $totalPelanggan ?? 0 }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h5>Total Penjualan</h5>
                    <h3>{{ $totalPenjualan ?? 0 }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <h5>Total Produk</h5>
                    <h3>{{ $totalProduk ?? 0 }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-3">
            <div class="card bg-dark text-white">
                <div class="card-body">
                    <h5>Total Pendapatan</h5>
                    <h3>Rp {{ number_format($totalPendapatan ?? 0, 2) }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
