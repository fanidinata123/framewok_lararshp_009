<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardResepsionisController extends Controller
{
    public function index()
    {
        $totalPet = DB::table('pet')->count();
        $totalPemilik = DB::table('pemilik')->count();
        $temuMenunggu = DB::table('temu_dokter')->where('status', '0')->count();
        $temuHariIni = DB::table('temu_dokter')
            ->whereDate('waktu_daftar', today())
            ->count();

        return view('resepsionis.dashboard.index', compact(
            'totalPet',
            'totalPemilik',
            'temuMenunggu',
            'temuHariIni'
        ));
    }
}