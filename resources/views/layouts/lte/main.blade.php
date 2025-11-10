<!-- resources/views/layouts/lte/main.blade.php -->
<!doctype html>
<html lang="en">
@include('layouts.lte.head')
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

  <div class="app-wrapper">
    @include('layouts.lte.navbar')
    @include('layouts.lte.sidebar')

    <main class="app-main">
      @yield('content')
    </main>

    @include('layouts.lte.footer')
  </div>

  <!-- Script -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"></script>
  <script src="{{ asset('assets/js/adminlte.js') }}"></script>
</body>
</html>
