<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PasienController extends Controller
{
    public function index()
    {
        $pets = DB::table('pet')
            ->join('pemilik', 'pet.idpemilik', '=', 'pemilik.idpemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->join('ras_hewan', 'pet.idras_hewan', '=', 'ras_hewan.idras_hewan')
            ->join('jenis_hewan', 'ras_hewan.idjenis_hewan', '=', 'jenis_hewan.idjenis_hewan')
            ->select(
                'pet.*',
                'user.nama as nama_pemilik',
                'pemilik.no_wa',
                'pemilik.alamat',
                'ras_hewan.nama_ras',
                'jenis_hewan.nama_jenis_hewan'
            )
            ->orderBy('pet.nama', 'asc')
            ->get();

        return view('perawat.pasien.index', compact('pets'));
    }

    public function show(Request $request)
    {
        $id = $request->query('id');
        
        $pet = DB::table('pet')
            ->join('pemilik', 'pet.idpemilik', '=', 'pemilik.idpemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->join('ras_hewan', 'pet.idras_hewan', '=', 'ras_hewan.idras_hewan')
            ->join('jenis_hewan', 'ras_hewan.idjenis_hewan', '=', 'jenis_hewan.idjenis_hewan')
            ->where('pet.idpet', $id)
            ->select(
                'pet.*',
                'user.nama as nama_pemilik',
                'pemilik.no_wa',
                'pemilik.alamat',
                'ras_hewan.nama_ras',
                'jenis_hewan.nama_jenis_hewan'
            )
            ->first();

        if (!$pet) {
            return redirect()->route('perawat.pasien.index')
                ->with('error', 'Data pasien tidak ditemukan');
        }

        // Ambil riwayat rekam medis
        $riwayatRekamMedis = DB::table('rekam_medis')
            ->where('idpet', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('perawat.pasien.show', compact('pet', 'riwayatRekamMedis'));
    }
}