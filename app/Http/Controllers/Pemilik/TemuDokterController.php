<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TemuDokterController extends Controller
{
    public function index()
    {
        $iduser = Auth::id();
        
        // Ambil data pemilik
        $pemilik = DB::table('pemilik')->where('iduser', $iduser)->first();
        
        if (!$pemilik) {
            return redirect()->route('login')->with('error', 'Data pemilik tidak ditemukan');
        }

        // Ambil jadwal temu dokter
        $temuDokter = DB::table('temu_dokter')
            ->join('pet', 'temu_dokter.idpet', '=', 'pet.idpet')
            ->join('role_user', 'temu_dokter.idrole_user', '=', 'role_user.idrole_user')
            ->join('user as dokter_user', 'role_user.iduser', '=', 'dokter_user.iduser')
            ->where('pet.idpemilik', $pemilik->idpemilik)
            ->select(
                'temu_dokter.*',
                'pet.nama as nama_pet',
                'dokter_user.nama as nama_dokter'
            )
            ->orderBy('temu_dokter.waktu_daftar', 'desc')
            ->get();

        return view('pemilik.temu_dokter.index', compact('temuDokter'));
    }
}