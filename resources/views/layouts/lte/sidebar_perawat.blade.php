<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
  <div class="sidebar-brand">
    <!-- PERBAIKAN: Ubah dari dokter.dashboard menjadi perawat.dashboard -->
    <a href="{{ route('perawat.dashboard') }}" class="brand-link">
      <img src="{{ asset('assets/img/AdminLTELogo.png') }}" alt="Logo" class="brand-image opacity-75 shadow">
      <span class="brand-text fw-light">Perawat Panel</span>
    </a>
  </div>

  <div class="sidebar-wrapper">
    <nav class="mt-2">
      <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu">
        
        <li class="nav-item">
          <a href="{{ route('perawat.dashboard') }}" class="nav-link">
            <i class="nav-icon bi bi-speedometer2"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <li class="nav-header">DATA PASIEN</li>

        <li class="nav-item">
          <a href="{{ route('perawat.pasien.index') }}" class="nav-link">
            <i class="nav-icon bi bi-bug"></i>
            <p>Data Pasien</p>
          </a>
        </li>

        <li class="nav-header">TRANSAKSI</li>

        <li class="nav-item">
          <a href="{{ route('perawat.rekam-medis.index') }}" class="nav-link">
            <i class="nav-icon bi bi-file-earmark-medical"></i>
            <p>Rekam Medis</p>
          </a>
        </li>

        <li class="nav-header">PROFIL</li>

        <li class="nav-item">
          <a href="{{ route('perawat.profil') }}" class="nav-link">
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