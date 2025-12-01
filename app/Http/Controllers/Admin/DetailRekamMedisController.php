<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DetailRekamMedis;
use App\Models\RekamMedis;
use App\Models\KodeTindakanTerapi;

class DetailRekamMedisController extends Controller
{
    public function index(Request $request)
    {
        $idrekam = $request->query('idrekam_medis');
        if (!$idrekam) {
            return redirect()->back()->with('error','idrekam_medis harus diberikan');
        }
        $rekam = RekamMedis::with('pet')->findOrFail($idrekam);
        $details = DetailRekamMedis::with('kodeTindakan')->where('idrekam_medis', $idrekam)->get();
        return view('admin.detail_rekam_medis.index', compact('rekam','details'));
    }

    public function create(Request $request)
    {
        $idrekam = $request->query('idrekam_medis');
        $rekam = RekamMedis::findOrFail($idrekam);
        $tindakan = KodeTindakanTerapi::all();
        return view('admin.detail_rekam_medis.create', compact('rekam','tindakan'));
    }

    public function store(Request $request)
    {
        $data = $this->validateDetail($request);

        DetailRekamMedis::create([
            'idrekam_medis' => $data['idrekam_medis'],
            'idkode_tindakan_terapi' => $data['idkode_tindakan_terapi'],
            'detail' => $data['detail'] ?? null,
        ]);

        return redirect()->route('admin.detail-rekam-medis.index', ['idrekam_medis' => $data['idrekam_medis']])->with('success','Detail rekam medis ditambahkan.');
    }

    public function edit(Request $request)
    {
        $id = $request->query('id');
        $detail = DetailRekamMedis::findOrFail($id);
        $tindakan = KodeTindakanTerapi::all();
        return view('admin.detail_rekam_medis.edit', compact('detail','tindakan'));
    }

    public function update(Request $request)
    {
        $data = $this->validateDetail($request);
        $id = $request->input('iddetail_rekam_medis');
        $row = DetailRekamMedis::findOrFail($id);
        $row->update([
            'idkode_tindakan_terapi' => $data['idkode_tindakan_terapi'],
            'detail' => $data['detail'] ?? null,
        ]);

        return redirect()->route('admin.detail-rekam-medis.index', ['idrekam_medis' => $row->idrekam_medis])->with('success','Detail diupdate.');
    }

    public function destroy(Request $request)
    {
        $id = $request->input('iddetail_rekam_medis');
        $row = DetailRekamMedis::findOrFail($id);
        $idrekam = $row->idrekam_medis;
        $row->delete();
        return redirect()->route('admin.detail-rekam-medis.index', ['idrekam_medis' => $idrekam])->with('success','Detail dihapus.');
    }

    private function validateDetail(Request $request)
    {
        return $request->validate([
            'idrekam_medis' => 'required|integer',
            'idkode_tindakan_terapi' => 'required|integer',
            'detail' => 'nullable|string|max:1000',
        ]);
    }
}
