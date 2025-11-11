<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RasHewan;
use App\Models\JenisHewan;
use Illuminate\Support\Facades\DB;

class RasHewanController extends Controller
{
    public function index()
    {
        $rasHewan = RasHewan::with('jenisHewan')->get();
        return view('admin.ras_hewan.index', compact('rasHewan'));
    }

    public function create()
    {
        $jenisHewan = JenisHewan::all();
        return view('admin.ras_hewan.create', compact('jenisHewan'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateRasHewan($request);
        
        RasHewan::create([
            'idras_hewan' => $this->generateNewId(),
            'nama_ras' => ucwords(strtolower($validated['nama_ras'])),
            'idjenis_hewan' => $validated['idjenis_hewan']
        ]);

        return redirect()->route('admin.ras-hewan.index')
                         ->with('success', 'Ras hewan berhasil ditambahkan!');
    }

    public function edit(Request $request)
    {
        $id = $request->query('id');
        $rasHewan = RasHewan::findOrFail($id);
        $jenisHewan = JenisHewan::all();
        return view('admin.ras_hewan.edit', compact('rasHewan', 'jenisHewan'));
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $validated = $this->validateRasHewan($request);

        $rasHewan = RasHewan::findOrFail($id);
        $rasHewan->update([
            'nama_ras' => ucwords(strtolower($validated['nama_ras'])),
            'idjenis_hewan' => $validated['idjenis_hewan']
        ]);

        return redirect()->route('admin.ras-hewan.index')
                         ->with('success', 'Ras hewan berhasil diupdate!');
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        RasHewan::findOrFail($id)->delete();
        
        return redirect()->route('admin.ras-hewan.index')
                         ->with('success', 'Ras hewan berhasil dihapus!');
    }

    private function validateRasHewan(Request $request)
    {
        return $request->validate([
            'nama_ras' => 'required|string|max:100',
            'idjenis_hewan' => 'required|exists:jenis_hewan,idjenis_hewan',
        ], [
            'nama_ras.required' => 'Nama ras harus diisi!',
            'idjenis_hewan.required' => 'Jenis hewan harus dipilih!',
        ]);
    }

    private function generateNewId()
    {
        $maxId = DB::table('ras_hewan')->max('idras_hewan');
        return $maxId ? $maxId + 1 : 1;
    }
}