<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardPerawatController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Ambil idrole_user perawat yang sedang login
        $roleUser = DB::table('role_user')
            ->where('iduser', $user->iduser)
            ->where('idrole', 3) // 3 = Perawat
            ->where('status', 1)
            ->first();

        // TAMPILKAN SEMUA DATA
        $countPasien = DB::table('pet')->count();
        $countTemuDokter = DB::table('temu_dokter')->count();
        $countRekamMedis = DB::table('rekam_medis')->count();
        $countTemuHariIni = DB::table('temu_dokter')
            ->whereDate('waktu_daftar', today())
            ->count();

        // Rekam medis terbaru (5 terakhir)
        $rekamTerbaru = DB::table('rekam_medis')
            ->join('pet', 'rekam_medis.idpet', '=', 'pet.idpet')
            ->join('pemilik', 'pet.idpemilik', '=', 'pemilik.idpemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->select(
                'rekam_medis.*',
                'pet.nama as nama_pet',
                'user.nama as nama_pemilik'
            )
            ->orderBy('rekam_medis.created_at', 'desc')
            ->limit(5)
            ->get();

        return view('perawat.dashboard.index', compact(
            'countPasien',
            'countTemuDokter',
            'countRekamMedis',
            'countTemuHariIni',
            'rekamTerbaru'
        ));
    }
}