{{-- Sidebar untuk Petugas --}}
<div class="sidebar" style="width: 200px; float: left; background-color: #f8f9fa; height: 100vh; padding: 20px;">
    <h4>Menu Petugas</h4>
    <ul style="list-style-type: none; padding-left: 0;">
        <li><a href="{{ route('userdashboard') }}">Dashboard</a></li>
        <li><a href="{{ route('admin.produk.index') }}">Pendataan Barang</a></li>
        <li><a href="{{ route('admin.penjualan.index') }}">Penjualan</a></li>
        <li><a href="{{ route('admin.detailpenjualan.index') }}">Stok Barang</a></li>
        <li><a href="{{ route('laporan.index') }}">Laporan</a></li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" style="background: none; border: none; color: red; cursor: pointer;">
                    Logout
                </button>
            </form>
        </li>
    </ul>
</div>
