<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RasHewan;

class RasHewanController extends Controller
{
    public function index()
    {
        $rasHewan = RasHewan::with('jenisHewan')->get();
        return view('admin.ras_hewan.index', compact('rasHewan'));
    }

    public function create()
    {
        return view('admin.ras_hewan.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateRasHewan($request);
        $formattedNama = $this->formatNamaRasHewan($validated['nama_ras_hewan']);
        $this->createRasHewan($formattedNama, $validated['idjenis_hewan']);

        return redirect()->route('admin.ras-hewan.index')->with('success', 'Ras hewan berhasil ditambahkan!');
    }

    private function validateRasHewan(Request $request)
    {
        return $request->validate([
            'nama_ras_hewan' => 'required|string|max:100',
            'idjenis_hewan' => 'required|integer',
        ]);
    }

    private function createRasHewan($nama, $idjenis)
    {
        RasHewan::create([
            'nama_ras_hewan' => $nama,
            'idjenis_hewan' => $idjenis
        ]);
    }

    private function formatNamaRasHewan($nama)
    {
        return ucwords(strtolower($nama));
    }
}
