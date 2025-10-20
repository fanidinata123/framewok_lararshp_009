<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class SiteController extends Controller
{
    public function home()
    {
        return view('site.home');
    }

    public function layanan()
    {
        return view('site.layanan');
    }

    public function kontak()
    {
        return view('site.kontak');
    }

    public function struktur()
    {
        return view('site.struktur');
    }

    public function login()
    {
        return view('site.login');
    }

    // 🔹 Tambahkan function cek koneksi di bawah ini
    public function cekKoneksi()
    {
        try {
            DB::connection()->getPdo();
            return "Koneksi ke database berhasil!!";
        } catch (\Exception $e) {
            return "Koneksi ke database gagal: " . $e->getMessage();
        }
    }
}
