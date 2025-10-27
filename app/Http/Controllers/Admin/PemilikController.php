<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pemilik;

class PemilikController extends Controller
{
    public function index()
    {
        // Mengambil data pemilik beserta relasi user
        $pemilik = Pemilik::with('user')->get();

        // Mengirim data ke view
        return view('admin.pemilik.index', compact('pemilik'));
    }
}
