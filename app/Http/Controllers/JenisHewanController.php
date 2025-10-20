<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisHewan;

class JenisHewanController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel jenis_hewan menggunakan Eloquent ORM
        $jenisHewan = JenisHewan::all();

        // Atau bisa juga gunakan select (pilih kolom tertentu)
        // $jenisHewan = JenisHewan::select('idjenis_hewan', 'nama_jenis_hewan')->get();

        // Mengirim data ke view
        return view('jenishewan.index', compact('jenisHewan'));
    }
}
