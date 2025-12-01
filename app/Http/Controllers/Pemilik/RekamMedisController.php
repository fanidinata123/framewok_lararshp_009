<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RekamMedisController extends Controller
{
    public function index()
    {
        $iduser = Auth::id();
        
        // Ambil data pemilik
        $pemilik = DB::table('pemilik')->where('iduser', $iduser)->first();
        
        if (!$pemilik) {
            return redirect()->route('login')->with('error', 'Data pemilik tidak ditemukan');
        }

        // Ambil rekam medis
        $rekamMedis = DB::table('rekam_medis')
            ->join('pet', 'rekam_medis.idpet', '=', 'pet.idpet')
            ->join('role_user', 'rekam_medis.dokter_pemeriksa', '=', 'role_user.idrole_user')
            ->join('user as dokter_user', 'role_user.iduser', '=', 'dokter_user.iduser')
            ->where('pet.idpemilik', $pemilik->idpemilik)
            ->select(
                'rekam_medis.*',
                'pet.nama as nama_pet',
                'dokter_user.nama as nama_dokter'
            )
            ->orderBy('rekam_medis.created_at', 'desc')
            ->get();

        return view('pemilik.rekam_medis.index', compact('rekamMedis'));
    }
}