<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RekamMedis;
use App\Models\Pet;
use App\Models\TemuDokter;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RekamMedisController extends Controller
{
    public function index()
    {
        $rekams = RekamMedis::with(['pet','dokter','temu'])
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('dokter.rekam_medis.index', compact('rekams'));
    }

    public function create()
    {
        $pets = Pet::all();

        $dokters = DB::table('role_user')
            ->join('user','role_user.iduser','=','user.iduser')
            ->where('role_user.idrole', 2)
            ->where('role_user.status', 1)
            ->select('user.iduser','user.nama')
            ->get();

        $temus = TemuDokter::where('status','0')->get();

        return view('dokter.rekam_medis.create', compact('pets','dokters','temus'));
    }

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
            'idreservasi_dokter' => $data['idreservasi_dokter'] ?? null,
        ]);

        if (!empty($data['idreservasi_dokter'])) {
            TemuDokter::where('idreservasi_dokter', $data['idreservasi_dokter'])
                        ->update(['status' => '1']);
        }

        return redirect()->route('dokter.rekam-medis.index')->with('success','Rekam medis berhasil disimpan.');
    }

    public function edit(Request $request)
    {
        $id = $request->query('id');
        $rekam = RekamMedis::findOrFail($id);

        $pets = Pet::all();

        $dokters = DB::table('role_user')
            ->join('user','role_user.iduser','=','user.iduser')
            ->where('role_user.idrole',2)
            ->where('role_user.status',1)
            ->select('user.iduser','user.nama')
            ->get();

        return view('dokter.rekam_medis.edit', compact('rekam','pets','dokters'));
    }

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

        return redirect()->route('dokter.rekam-medis.index')->with('success','Rekam medis berhasil diupdate.');
    }

    public function destroy(Request $request)
{
    $rekam = RekamMedis::findOrFail($request->idrekam_medis);

    // Hapus semua detail rekam medis yang terhubung
    $rekam->details()->delete();

    // Setelah itu baru boleh hapus rekam medis
    $rekam->delete();

    return redirect()->route('dokter.rekam-medis.index')
                     ->with('success', 'Rekam medis berhasil dihapus');
}


    private function validateRekam(Request $request)
    {
        return $request->validate([
            'tanggal' => 'nullable|date',
            'anamnesa' => 'nullable|string|max:1000',
            'temuan_klinis' => 'nullable|string|max:1000',
            'diagnosa' => 'nullable|string|max:1000',
            'idpet' => 'required|integer',
            'dokter_pemeriksa' => 'required|integer',
            'idreservasi_dokter' => 'nullable|integer',
        ]);
    }
}
