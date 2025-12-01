<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Pemilik Panel</title>

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .sidebar-dark-primary {
            background: linear-gradient(180deg, #047857 0%, #059669 100%) !important;
        }
        .nav-sidebar .nav-link.active {
            background: rgba(255, 255, 255, 0.2) !important;
            color: #fff !important;
        }
        .brand-link {
            background: rgba(0, 0, 0, 0.2) !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1) !important;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="bi bi-person-circle"></i> {{ Auth::user()->nama }}
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="{{ route('pemilik.profil.index') }}" class="dropdown-item">
                        <i class="bi bi-person"></i> Profil Saya
                    </a>
                    <div class="dropdown-divider"></div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </nav>

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="{{ route('pemilik.dashboard') }}" class="brand-link">
            <i class="bi bi-house-heart brand-image" style="font-size: 2rem; color: #fff;"></i>
            <span class="brand-text font-weight-light">Pemilik Panel</span>
        </a>

        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <i class="bi bi-person-circle" style="font-size: 2rem; color: #fff;"></i>
                </div>
                <div class="info">
                    <a href="{{ route('pemilik.profil.index') }}" class="d-block">{{ Auth::user()->nama }}</a>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                    
                    <!-- Dashboard -->
                    <li class="nav-item">
                        <a href="{{ route('pemilik.dashboard') }}" class="nav-link {{ Request::is('pemilik/dashboard') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-speedometer2"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-header">DATA HEWAN</li>

                    <!-- Pet Saya -->
                    <li class="nav-item">
                        <a href="{{ route('pemilik.pet.index') }}" class="nav-link {{ Request::is('pemilik/pet*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-badge-vr"></i>
                            <p>Pet Saya</p>
                        </a>
                    </li>

                    <li class="nav-header">LAYANAN</li>

                    <!-- Jadwal Temu Dokter -->
                    <li class="nav-item">
                        <a href="{{ route('pemilik.temu-dokter.index') }}" class="nav-link {{ Request::is('pemilik/temu-dokter*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-calendar-check"></i>
                            <p>Jadwal Temu Dokter</p>
                        </a>
                    </li>

                    <!-- Rekam Medis -->
                    <li class="nav-item">
                        <a href="{{ route('pemilik.rekam-medis.index') }}" class="nav-link {{ Request::is('pemilik/rekam-medis*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-file-medical"></i>
                            <p>Rekam Medis</p>
                        </a>
                    </li>

                    <li class="nav-header">PROFIL</li>

                    <!-- Profil -->
                    <li class="nav-item">
                        <a href="{{ route('pemilik.profil.index') }}" class="nav-link {{ Request::is('pemilik/profil*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-person"></i>
                            <p>Profil Saya</p>
                        </a>
                    </li>

                    <!-- Logout -->
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link text-left w-100" style="color: rgba(255,255,255,.8);">
                                <i class="nav-icon bi bi-box-arrow-right"></i>
                                <p>Logout</p>
                            </button>
                        </form>
                    </li>

                </ul>
            </nav>
        </div>
    </aside>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('title')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('pemilik.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2025 <a href="#">Sistem Klinik Hewan</a>.</strong> All rights reserved.
        <div class="float-right d-none d-sm-inline-block"><b>Version</b> 1.0.0</div>
    </footer>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
@stack('scripts')
</body>
</html>