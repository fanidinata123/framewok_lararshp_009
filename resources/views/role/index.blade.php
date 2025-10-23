<!DOCTYPE html>
<html>
<head>
    <title>Data Role dan User</title>
    <style>
        body { font-family: Arial; background-color: #f2f6fc; margin: 0; padding: 0; }
        header { background-color: #007bff; color: white; text-align: center; padding: 15px 0; font-size: 22px; }
        h2 { text-align: center; color: #333; margin-top: 20px; }
        table { width: 90%; margin: 20px auto; border-collapse: collapse; background: white; border-radius: 6px; box-shadow: 0 0 8px rgba(0,0,0,0.1); }
        th { background-color: #007bff; color: white; padding: 10px; }
        td { padding: 10px; text-align: center; border-bottom: 1px solid #ddd; }
        tr:hover { background-color: #f1f9ff; }
        footer { text-align: center; color: #666; padding: 10px; margin-top: 40px; }
    </style>
</head>
<body>
<header>Data Role dan User</header>
<h2>Daftar Role dengan Usernya</h2>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Role</th>
            <th>Daftar User</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($role as $r)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $r->nama_role }}</td>
            <td>
                @foreach ($r->users as $u)
                    {{ $u->nama }} ({{ $u->pivot->status == 1 ? 'Aktif' : 'Nonaktif' }})<br>
                @endforeach
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<footer>© 2025 Sistem Informasi Klinik Hewan</footer>
</body>
</html>
