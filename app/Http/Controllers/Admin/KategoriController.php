<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateKategori($request);
        $nama = $this->formatNamaKategori($validated['nama_kategori']);
        $this->createKategori($nama);

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    private function validateKategori(Request $request)
    {
        return $request->validate([
            'nama_kategori' => 'required|string|max:100',
        ]);
    }

    private function createKategori($nama)
    {
        Kategori::create(['nama_kategori' => $nama]);
    }

    private function formatNamaKategori($nama)
    {
        return ucwords(strtolower($nama));
    }
}
