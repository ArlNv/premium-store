<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    @auth
    @if (auth()->user()->role == 'admin')
    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    @endif
@endauth


    @auth
    @if (auth()->user()->role == 'pembeli')
    <li class="nav-item {{ request()->is('beranda') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('beranda.pembeli') }}">
        <i class="fas fa-home"></i>
        <span>Beranda</span>
    </a>
    </li>
    @endif
@endauth

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    @auth
    @if(auth()->user()->role === 'admin')
    <li class="nav-item {{ request()->routeIs('klien.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('klien.index') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Klien</span></a>
    </li>
    @endif
@endauth

    @auth
    @if(auth()->user()->role === 'pembeli')
        <li class="nav-item {{ request()->is('beli*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('beli.index') }}">
                <i class="fas fa-shopping-cart"></i>
                <span>Pembelian</span>
            </a>
        </li>
    @endif
@endauth

    @auth
    @if(auth()->user()->role === 'admin')
    <li class="nav-item {{ request()->routeIs('paket-internet.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('paket-internet.index') }}">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Paket Premium</span></a>
    </li>
    @endif
@endauth

    @auth
    @if(auth()->user()->role === 'admin')
    <li class="nav-item {{ request()->routeIs('administrator-aplikasi.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('administrator-aplikasi.index') }}">
            <i class="fas fa-fw fa-user-shield"></i>
            <span>Staff/Admin</span></a>
    </li>
    @endif
@endauth

    @auth
    @if(auth()->user()->role === 'admin')
    <li class="nav-item {{ request()->routeIs('tagihan.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('tagihan.index') }}">
            <i class="fas fa-fw fa-money-check"></i>
            <span>Tagihan</span></a>
    </li>
    @endif
@endauth

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Laporan
    </div>

    @auth
    @if(auth()->user()->role === 'admin')
    <li class="nav-item {{ request()->routeIs('laporan.rekap.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('laporan.rekap.index') }}">
            <i class="fas fa-fw fa-money-check"></i>
            <span>Rekap</span></a>
    </li>
    @endif
@endauth

    @auth
    @if(auth()->user()->role === 'pembeli')
        <li class="nav-item {{ request()->routeIs('riwayat.beli') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('riwayat.beli') }}">
                <i class="fas fa-fw fa-history"></i>
                <span>Riwayat Saya</span>
            </a>
        </li>
    @endif
@endauth


@auth
@if(auth()->user()->role === 'admin')
    <li class="nav-item {{ request()->is('admin/pembelian*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.pembelian.index') }}">
            <i class="fas fa-table"></i>
            <span>Data Pembelian</span>
        </a>
    </li>
@endif
@endauth

<!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>