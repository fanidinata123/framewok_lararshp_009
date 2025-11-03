<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KodeTindakanTerapi;

class KodeTindakanTerapiController extends Controller
{
    public function index()
    {
        $kodeTindakan = KodeTindakanTerapi::all();
        return view('admin.kode_tindakan.index', compact('kodeTindakan'));
    }

    public function create()
    {
        return view('admin.kode_tindakan.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateKodeTindakan($request);
        $nama = $this->formatNamaKodeTindakan($validated['nama_tindakan']);
        $kode = strtoupper($validated['kode_tindakan']);
        $this->createKodeTindakan($kode, $nama);

        return redirect()->route('admin.kode-tindakan.index')->with('success', 'Kode tindakan berhasil ditambahkan!');
    }

    private function validateKodeTindakan(Request $request)
    {
        return $request->validate([
            'kode_tindakan' => 'required|string|max:20|unique:kode_tindakan_terapi,kode_tindakan',
            'nama_tindakan' => 'required|string|max:150',
        ]);
    }

    private function createKodeTindakan($kode, $nama)
    {
        KodeTindakanTerapi::create([
            'kode_tindakan' => $kode,
            'nama_tindakan' => $nama,
        ]);
    }

    private function formatNamaKodeTindakan($nama)
    {
        return ucwords(strtolower($nama));
    }
}
