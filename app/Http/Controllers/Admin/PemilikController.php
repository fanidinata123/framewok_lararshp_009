<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemilik;

class PemilikController extends Controller
{
    public function index()
    {
        $pemilik = Pemilik::all();
        return view('admin.pemilik.index', compact('pemilik'));
    }

    public function create()
    {
        return view('admin.pemilik.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validatePemilik($request);
        $nama = $this->formatNamaPemilik($validated['nama_pemilik']);
        $this->createPemilik($nama, $validated['alamat'], $validated['telepon']);

        return redirect()->route('admin.pemilik.index')->with('success', 'Pemilik berhasil ditambahkan!');
    }

    private function validatePemilik(Request $request)
    {
        return $request->validate([
            'nama_pemilik' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|string|max:20',
        ]);
    }

    private function createPemilik($nama, $alamat, $telepon)
    {
        Pemilik::create([
            'nama_pemilik' => $nama,
            'alamat' => $alamat,
            'telepon' => $telepon,
        ]);
    }

    private function formatNamaPemilik($nama)
    {
        return ucwords(strtolower($nama));
    }
}
