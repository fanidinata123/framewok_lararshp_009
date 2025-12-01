<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardDokterController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Ambil idrole_user dokter yang sedang login
        $roleUser = DB::table('role_user')
            ->where('iduser', $user->iduser)
            ->where('idrole', 2)
            ->where('status', 1)
            ->first();

        // TAMPILKAN SEMUA DATA (tidak difilter per dokter)
        $countPasien = DB::table('pet')->count();
        
        // Total temu dokter SEMUA dokter
        $countTemuDokter = DB::table('temu_dokter')->count();
        
        // Total rekam medis SEMUA dokter
        $countRekamMedis = DB::table('rekam_medis')->count();
        
        // Temu hari ini SEMUA dokter
        $countTemuHariIni = DB::table('temu_dokter')
            ->whereDate('waktu_daftar', today())
            ->count();

        // Temu dokter terbaru (5 terakhir) - SEMUA DATA
        $temuTerbaru = DB::table('temu_dokter')
            ->join('pet', 'temu_dokter.idpet', '=', 'pet.idpet')
            ->join('pemilik', 'pet.idpemilik', '=', 'pemilik.idpemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->select(
                'temu_dokter.*',
                'pet.nama as nama_pet',
                'user.nama as nama_pemilik'
            )
            ->orderBy('waktu_daftar', 'desc')
            ->limit(5)
            ->get();

        return view('dokter.dashboard.index', compact(
            'countPasien',
            'countTemuDokter',
            'countRekamMedis',
            'countTemuHariIni',
            'temuTerbaru'
        ));
    }
}