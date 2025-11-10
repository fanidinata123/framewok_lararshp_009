<!-- resources/views/layouts/lte/navbar.blade.php -->
<nav class="app-header navbar navbar-expand bg-body">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
          <i class="bi bi-list"></i>
        </a>
      </li>
      <li class="nav-item d-none d-md-block">
        <a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a>
      </li>
      <li class="nav-item d-none d-md-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <ul class="navbar-nav ms-auto">
      <li class="nav-item">
        <a class="nav-link" href="#" data-lte-toggle="fullscreen">
          <i class="bi bi-arrows-fullscreen"></i>
        </a>
      </li>
    </ul>
  </div>
</nav>
