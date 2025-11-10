<!-- Sidebar -->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
  <div class="sidebar-brand">
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
      <img src="{{ asset('assets/img/AdminLTELogo.png') }}" alt="Logo" class="brand-image opacity-75 shadow">
      <span class="brand-text fw-light">AdminLTE 4</span>
    </a>
  </div>

  <div class="sidebar-wrapper">
    <nav class="mt-2">
      <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu">
        <li class="nav-item">
          <a href="{{ route('admin.dashboard') }}" class="nav-link">
            <i class="nav-icon bi bi-speedometer2"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <li class="nav-header">DATA MASTER</li>

        <li class="nav-item"><a href="{{ route('admin.jenis-hewan.index') }}" class="nav-link"><i class="bi bi-box"></i> <p>Jenis Hewan</p></a></li>
        <li class="nav-item"><a href="{{ route('admin.kategori.index') }}" class="nav-link"><i class="bi bi-tags"></i> <p>Kategori</p></a></li>
        <li class="nav-item"><a href="{{ route('admin.kategori-klinis.index') }}" class="nav-link"><i class="bi bi-heart-pulse"></i> <p>Kategori Klinis</p></a></li>
        <li class="nav-item"><a href="{{ route('admin.kode-tindakan.index') }}" class="nav-link"><i class="bi bi-clipboard2-pulse"></i> <p>Kode Tindakan</p></a></li>
        <li class="nav-item"><a href="{{ route('admin.pemilik.index') }}" class="nav-link"><i class="bi bi-person-badge"></i> <p>Pemilik</p></a></li>
        <li class="nav-item"><a href="{{ route('admin.pet.index') }}" class="nav-link"><i class="bi bi-bug"></i> <p>Pet</p></a></li>
        <li class="nav-item"><a href="{{ route('admin.ras-hewan.index') }}" class="nav-link"><i class="bi bi-diagram-3"></i> <p>Ras Hewan</p></a></li>

        <li class="nav-header">AKSES</li>
        <li class="nav-item"><a href="{{ route('admin.role.index') }}" class="nav-link"><i class="bi bi-shield-lock"></i> <p>Role</p></a></li>
        <li class="nav-item"><a href="{{ route('admin.role-user.index') }}" class="nav-link"><i class="bi bi-person-gear"></i> <p>Role User</p></a></li>
        <li class="nav-item"><a href="{{ route('admin.user.index') }}" class="nav-link"><i class="bi bi-people"></i> <p>User</p></a></li>
      </ul>
    </nav>
  </div>
</aside>
