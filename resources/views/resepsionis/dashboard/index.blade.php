<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Resepsionis</title>
    <style>
        body {font-family: Arial, sans-serif; background: #eef4ff; margin: 0;}
        header {background: #007bff; color: white; text-align: center; padding: 15px; font-size: 22px;}
        nav {background: #0056b3; padding: 10px; text-align: center;}
        nav a {color: white; text-decoration: none; margin: 0 15px; font-weight: bold;}
        section {text-align: center; padding: 50px; color: #333;}
        footer {text-align: center; color: #777; padding: 10px; margin-top: 40px;}
    </style>
</head>
<body>

<header>Dashboard Resepsionis</header>

<nav>
    <a href="{{ route('resepsionis.dashboard') }}">Dashboard</a>
    <a href="{{ route('resepsionis.pendaftaran') }}">Data Pendaftaran</a>
    <a href="{{ route('logout') }}"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
       Logout
    </a>
</nav>

<section>
    <h2>Selamat Datang di Dashboard Resepsionis</h2>
    <p>Gunakan menu di atas untuk melihat data pendaftaran atau logout.</p>
</section>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
    @csrf
</form>

<footer>© 2025 Sistem Informasi Klinik Hewan</footer>

</body>
</html>
