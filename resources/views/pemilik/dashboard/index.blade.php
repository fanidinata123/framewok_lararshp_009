<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Pemilik</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4ff;
            margin: 0;
        }
        header {
            background-color: #007bff;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 22px;
        }
        nav {
            background: #0056b3;
            padding: 10px;
            text-align: center;
        }
        nav a {
            color: white;
            text-decoration: none;
            margin: 0 20px;
            font-weight: bold;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .content {
            text-align: center;
            margin-top: 40px;
        }
        footer {
            text-align: center;
            margin-top: 40px;
            color: #777;
        }
    </style>
</head>
<body>
<header>Dashboard Pemilik</header>

<nav>
    <a href="{{ route('pemilik.dashboard') }}">Dashboard</a>
    <a href="{{ route('pemilik.pet') }}">Data Pet</a>
    <a href="{{ route('logout') }}" 
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
       Logout
    </a>
</nav>

<div class="content">
    <h2>Selamat Datang di Dashboard Pemilik</h2>
    <p>Anda dapat melihat data pet yang Anda miliki.</p>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
    @csrf
</form>

<footer>© 2025 Sistem Informasi Klinik Hewan</footer>
</body>
</html>
