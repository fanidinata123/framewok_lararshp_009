<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Dokter Panel</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- AdminLTE 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0-beta2/dist/css/adminlte.min.css">
    <!-- OverlayScrollbars -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css">

    @stack('styles')
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

<div class="app-wrapper">
    
    {{-- NAVBAR DOKTER --}}
    <nav class="app-header navbar navbar-expand bg-body">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                        <i class="bi bi-list"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-md-block">
                    <a href="{{ route('dokter.dashboard') }}" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item d-none d-md-block">
                    <a href="{{ route('dokter.profil') }}" class="nav-link">Profil</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-bs-toggle="dropdown" href="#">
                        <i class="bi bi-person-circle"></i>
                        <span class="d-none d-md-inline ms-1">{{ Auth::user()->nama }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="{{ route('dokter.profil') }}" class="dropdown-item">
                            <i class="bi bi-person me-2"></i> Profil
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-item"
                           onclick="event.preventDefault(); document.getElementById('logout-form-navbar').submit();">
                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                        </a>
                        <form id="logout-form-navbar" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                        <i class="bi bi-arrows-fullscreen"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    {{-- SIDEBAR DOKTER --}}
    <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <div class="sidebar-brand">
            <a href="{{ route('dokter.dashboard') }}" class="brand-link">
                <img src="{{ asset('assets/img/AdminLTELogo.png') }}" alt="Logo" class="brand-image opacity-75 shadow">
                <span class="brand-text fw-light">Dokter Panel</span>
            </a>
        </div>

        <div class="sidebar-wrapper">
            <nav class="mt-2">
                <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu">
                    
                    <li class="nav-item">
                        <a href="{{ route('dokter.dashboard') }}" class="nav-link {{ Request::is('dokter/dashboard') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-speedometer2"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-header">DATA PASIEN</li>

                    <li class="nav-item">
                        <a href="{{ route('dokter.pasien.index') }}" class="nav-link {{ Request::is('dokter/pasien*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-bug"></i>
                            <p>Data Pasien</p>
                        </a>
                    </li>

                    <li class="nav-header">TRANSAKSI</li>

                    <li class="nav-item">
                        <a href="{{ route('dokter.temu-dokter.index') }}" class="nav-link {{ Request::is('dokter/temu-dokter*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-calendar-check"></i>
                            <p>Jadwal Temu</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('dokter.rekam-medis.index') }}" class="nav-link {{ Request::is('dokter/rekam-medis*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-file-earmark-medical"></i>
                            <p>Rekam Medis</p>
                        </a>
                    </li>

                    <li class="nav-header">PROFIL</li>

                    <li class="nav-item">
                        <a href="{{ route('dokter.profil') }}" class="nav-link {{ Request::is('dokter/profil') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-person-circle"></i>
                            <p>Profil Saya</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="nav-icon bi bi-box-arrow-right"></i>
                            <p>Logout</p>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    
                </ul>
            </nav>
        </div>
    </aside>

    {{-- MAIN CONTENT --}}
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">@yield('title')</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('dokter.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </main>

    {{-- FOOTER --}}
    <footer class="app-footer">
        <div class="float-end d-none d-sm-inline">
            <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2025 <a href="#">Sistem Klinik Hewan</a>.</strong>
        All rights reserved.
    </footer>
    
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0-beta2/dist/js/adminlte.min.js"></script>

@stack('scripts')
</body>
</html>