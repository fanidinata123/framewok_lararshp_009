<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RekamMedis;
use App\Models\Pet;
use App\Models\TemuDokter;
use Illuminate\Support\Facades\DB;

class RekamMedisController extends Controller
{
    /**
     * Tampilkan daftar rekam medis
     */
    public function index()
    {
        // Ambil rekam medis dengan JOIN manual untuk mendapatkan nama dokter yang benar
        $rekams = DB::table('rekam_medis')
            ->join('pet', 'rekam_medis.idpet', '=', 'pet.idpet')
            ->join('pemilik', 'pet.idpemilik', '=', 'pemilik.idpemilik')
            ->join('user as pemilik_user', 'pemilik.iduser', '=', 'pemilik_user.iduser')
            ->join('role_user', 'rekam_medis.dokter_pemeriksa', '=', 'role_user.idrole_user')
            ->join('user as dokter_user', 'role_user.iduser', '=', 'dokter_user.iduser')
            ->select(
                'rekam_medis.*',
                'pet.nama as nama_pet',
                'pet.idpet',
                'pemilik_user.nama as nama_pemilik',
                'dokter_user.nama as nama_dokter'
            )
            ->orderBy('rekam_medis.created_at', 'asc')
            ->get();

        return view('perawat.rekam_medis.index', compact('rekams'));
    }

    /**
     * Tampilkan form tambah rekam medis
     */
    public function create()
    {
        // Ambil semua pet dengan relasi pemilik
        $pets = Pet::with('pemilik.user')->get();

        // Ambil daftar dokter dengan idrole_user
        $dokters = DB::table('role_user')
            ->join('user', 'role_user.iduser', '=', 'user.iduser')
            ->where('role_user.idrole', 2)
            ->where('role_user.status', 1)
            ->select(
                'user.iduser',
                'user.nama',
                'role_user.idrole_user'
            )
            ->get();

        // Ambil temu dokter yang statusnya masih 0
        $temus = TemuDokter::where('status', '0')->with('pet')->get();

        return view('perawat.rekam_medis.create', compact('pets', 'dokters', 'temus'));
    }

    /**
     * Simpan rekam medis baru
     */
    public function store(Request $request)
    {
        $data = $this->validateRekam($request);

        RekamMedis::create([
            'created_at' => $data['tanggal'] ?? now(),
            'anamnesa' => $data['anamnesa'],
            'temuan_klinis' => $data['temuan_klinis'],
            'diagnosa' => $data['diagnosa'],
            'idpet' => $data['idpet'],
            'dokter_pemeriksa' => $data['dokter_pemeriksa'],
        ]);

        if (!empty($data['idreservasi_dokter'])) {
            TemuDokter::where('idreservasi_dokter', $data['idreservasi_dokter'])
                ->update(['status' => '1']);
        }

        return redirect()
            ->route('perawat.rekam-medis.index')
            ->with('success', 'Rekam medis berhasil disimpan.');
    }

    /**
     * Tampilkan form edit rekam medis
     */
    public function edit(Request $request)
    {
        $id = $request->query('id');
        $rekam = RekamMedis::findOrFail($id);

        $pets = Pet::with('pemilik.user')->get();

        $dokters = DB::table('role_user')
            ->join('user', 'role_user.iduser', '=', 'user.iduser')
            ->where('role_user.idrole', 2)
            ->where('role_user.status', 1)
            ->select(
                'user.iduser',
                'user.nama',
                'role_user.idrole_user'
            )
            ->get();

        return view('perawat.rekam_medis.edit', compact('rekam', 'pets', 'dokters'));
    }

    /**
     * Update rekam medis
     */
    public function update(Request $request)
    {
        $data = $this->validateRekam($request);
        $rekam = RekamMedis::findOrFail($request->input('idrekam_medis'));

        $rekam->update([
            'created_at' => $data['tanggal'] ?? $rekam->created_at,
            'anamnesa' => $data['anamnesa'],
            'temuan_klinis' => $data['temuan_klinis'],
            'diagnosa' => $data['diagnosa'],
            'idpet' => $data['idpet'],
            'dokter_pemeriksa' => $data['dokter_pemeriksa'],
        ]);

        return redirect()
            ->route('perawat.rekam-medis.index')
            ->with('success', 'Rekam medis berhasil diupdate.');
    }

    /**
     * Hapus rekam medis
     */
    public function destroy(Request $request)
    {
        $rekam = RekamMedis::findOrFail($request->idrekam_medis);

        DB::table('detail_rekam_medis')
            ->where('idrekam_medis', $rekam->idrekam_medis)
            ->delete();

        $rekam->delete();

        return redirect()
            ->route('perawat.rekam-medis.index')
            ->with('success', 'Rekam medis berhasil dihapus');
    }

    /**
     * Validasi input rekam medis
     */
    private function validateRekam(Request $request)
    {
        return $request->validate([
            'tanggal' => 'nullable|date',
            'anamnesa' => 'nullable|string|max:1000',
            'temuan_klinis' => 'nullable|string|max:1000',
            'diagnosa' => 'nullable|string|max:1000',
            'idpet' => 'required|integer|exists:pet,idpet',
            'dokter_pemeriksa' => 'required|integer|exists:role_user,idrole_user',
            'idreservasi_dokter' => 'nullable|integer|exists:temu_dokter,idreservasi_dokter',
        ], [
            'idpet.required' => 'Pet harus dipilih',
            'dokter_pemeriksa.required' => 'Dokter pemeriksa harus dipilih',
            'dokter_pemeriksa.exists' => 'Dokter tidak ditemukan.',
        ]);
    }
}