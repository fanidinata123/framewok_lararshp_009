<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;

class PendaftaranController extends Controller
{
    public function index()
    {
        $pendaftaran = Pendaftaran::with(['pet', 'dokter'])->get();

        return view('resepsionis.pendaftaran.index', compact('pendaftaran'));
    }
}
