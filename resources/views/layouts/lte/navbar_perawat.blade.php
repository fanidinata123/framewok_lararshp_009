<nav class="app-header navbar navbar-expand bg-body">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
          <i class="bi bi-list"></i>
        </a>
      </li>
      <li class="nav-item d-none d-md-block">
        <a href="{{ route('perawat.dashboard') }}" class="nav-link">Dashboard</a>
      </li>
      <li class="nav-item d-none d-md-block">
        <a href="{{ route('perawat.profil') }}" class="nav-link">Profil</a>
      </li>
    </ul>

    <ul class="navbar-nav ms-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-bs-toggle="dropdown" href="#">
          <i class="bi bi-person-circle"></i>
          <span class="d-none d-md-inline ms-1">{{ Auth::user()->nama }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
          <a href="{{ route('perawat.profil') }}" class="dropdown-item">
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