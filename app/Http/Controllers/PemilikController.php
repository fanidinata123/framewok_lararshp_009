<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemilik;

class PemilikController extends Controller
{
    public function index()
    {
        // Mengambil data pemilik beserta relasi user
        $pemilik = Pemilik::with('user')->get();

        // Mengirim data ke view
        return view('pemilik.index', compact('pemilik'));
    }
}
