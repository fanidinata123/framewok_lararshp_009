<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriKlinis;

class KategoriKlinisController extends Controller
{
    public function index()
    {
        $kategoriKlinis = KategoriKlinis::all();
        return view('admin.kategori_klinis.index', compact('kategoriKlinis'));
    }

    public function create()
    {
        return view('admin.kategori_klinis.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateKategoriKlinis($request);
        $nama = $this->formatNamaKategoriKlinis($validated['nama_kategori_klinis']);
        $this->createKategoriKlinis($nama);

        return redirect()->route('admin.kategori-klinis.index')->with('success', 'Kategori klinis berhasil ditambahkan!');
    }

    private function validateKategoriKlinis(Request $request)
    {
        return $request->validate([
            'nama_kategori_klinis' => 'required|string|max:100',
        ]);
    }

    private function createKategoriKlinis($nama)
    {
        KategoriKlinis::create(['nama_kategori_klinis' => $nama]);
    }

    private function formatNamaKategoriKlinis($nama)
    {
        return ucwords(strtolower($nama));
    }
}
