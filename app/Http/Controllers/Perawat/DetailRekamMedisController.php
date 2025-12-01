<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailRekamMedisController extends Controller
{
    public function index(Request $request)
    {
        $idrekam = $request->query('idrekam_medis');
        
        if (!$idrekam) {
            return redirect()->back()->with('error', 'idrekam_medis harus diberikan');
        }

        // Ambil data rekam medis dengan JOIN yang benar
        $rekam = DB::table('rekam_medis')
            ->join('pet', 'rekam_medis.idpet', '=', 'pet.idpet')
            ->join('pemilik', 'pet.idpemilik', '=', 'pemilik.idpemilik')
            ->join('user as pemilik_user', 'pemilik.iduser', '=', 'pemilik_user.iduser')
            ->join('role_user', 'rekam_medis.dokter_pemeriksa', '=', 'role_user.idrole_user')
            ->join('user as dokter_user', 'role_user.iduser', '=', 'dokter_user.iduser')
            ->where('rekam_medis.idrekam_medis', $idrekam)
            ->select(
                'rekam_medis.*',
                'pet.nama as nama_pet',
                'pemilik_user.nama as nama_pemilik',
                'dokter_user.nama as nama_dokter'
            )
            ->first();

        if (!$rekam) {
            return redirect()->route('perawat.rekam-medis.index')
                ->with('error', 'Data rekam medis tidak ditemukan');
        }

        // Ambil detail tindakan/terapi
        $details = DB::table('detail_rekam_medis')
            ->join('kode_tindakan_terapi', 'detail_rekam_medis.idkode_tindakan_terapi', '=', 'kode_tindakan_terapi.idkode_tindakan_terapi')
            ->join('kategori', 'kode_tindakan_terapi.idkategori', '=', 'kategori.idkategori')
            ->join('kategori_klinis', 'kode_tindakan_terapi.idkategori_klinis', '=', 'kategori_klinis.idkategori_klinis')
            ->where('detail_rekam_medis.idrekam_medis', $idrekam)
            ->select(
                'detail_rekam_medis.*',
                'kode_tindakan_terapi.kode',
                'kode_tindakan_terapi.deskripsi_tindakan_terapi',
                'kategori.nama_kategori',
                'kategori_klinis.nama_kategori_klinis'
            )
            ->get();

        return view('perawat.detail_rekam_medis.index', compact('rekam', 'details'));
    }
}