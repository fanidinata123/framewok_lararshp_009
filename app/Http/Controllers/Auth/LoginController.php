<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /**
     * Tampilkan form login.
     * Jika user masih login, otomatis logout dulu agar bisa login ulang.
     */
    public function showLoginForm()
    {
        if (Auth::check()) {
            Auth::logout(); // Logout otomatis biar form login muncul
        }
        return view('auth.login');
    }

    /**
     * Proses login user.
     */
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Ambil role aktif user
            $role = DB::table('role_user')
                ->join('role', 'role.idrole', '=', 'role_user.idrole')
                ->where('role_user.iduser', $user->iduser)
                ->where('role_user.status', 1)
                ->select('role.nama_role')
                ->first();

            // Arahkan sesuai role
            if ($role) {
                switch ($role->nama_role) {
                    case 'Administrator':
                        return redirect()->route('admin.dashboard');
                    case 'Dokter':
                        return redirect()->route('dokter.dashboard');
                    case 'Perawat':
                        return redirect()->route('perawat.dashboard');
                    case 'Resepsionis':
                        return redirect()->route('resepsionis.dashboard');
                    case 'Pemilik':
                        return redirect()->route('pemilik.dashboard');
                    default:
                        return redirect()->route('site.home');
                }
            }

            // Kalau role tidak ditemukan
            Auth::logout();
            return back()->withErrors(['email' => 'Role tidak ditemukan atau tidak aktif.']);
        }

        // Kalau gagal login
        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    /**
     * Logout user dan arahkan ke halaman login.
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
