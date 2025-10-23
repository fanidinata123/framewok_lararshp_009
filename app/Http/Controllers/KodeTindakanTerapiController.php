<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KodeTindakanTerapi;

class KodeTindakanTerapiController extends Controller
{
    public function index()
    {
        // Ambil semua data dengan relasi kategori & kategori klinis
        $tindakan = KodeTindakanTerapi::with(['kategori', 'kategoriKlinis'])->get();
        return view('kode_tindakan.index', compact('tindakan'));
    }
}
