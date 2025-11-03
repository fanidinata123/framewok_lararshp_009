<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisHewan;

class JenisHewanController extends Controller
{
    // 🔹 Menampilkan data jenis hewan
    public function index()
    {
        $jenisHewan = JenisHewan::all();
        return view('admin.jenis_hewan.index', compact('jenisHewan'));
    }

    // 🔹 Menampilkan form tambah data
    public function create()
    {
        return view('admin.jenis_hewan.create');
    }

    // 🔹 Menyimpan data ke database
    public function store(Request $request)
    {
        // 1️⃣ Validasi data menggunakan fungsi private
        $validatedData = $this->validateJenisHewan($request);

        // 2️⃣ Format nama jenis hewan sebelum disimpan
        $formattedName = $this->formatNamaJenisHewan($validatedData['nama_jenis_hewan']);

        // 3️⃣ Eksekusi penyimpanan ke database
        $this->createJenisHewan($formattedName);

        // 4️⃣ Redirect dengan pesan sukses
        return redirect()->route('admin.jenis-hewan.index')->with('success', 'Data jenis hewan berhasil ditambahkan!');
    }

    // ======================================================
    // 🔒 PRIVATE FUNCTIONS (VALIDATION + HELPER)
    // ======================================================

    /**
     * Fungsi untuk validasi input data jenis hewan
     */
    private function validateJenisHewan(Request $request)
    {
        return $request->validate([
            'nama_jenis_hewan' => 'required|string|max:100',
        ], [
            'nama_jenis_hewan.required' => 'Nama jenis hewan harus diisi!',
            'nama_jenis_hewan.string' => 'Nama jenis hewan harus berupa teks!',
            'nama_jenis_hewan.max' => 'Nama jenis hewan maksimal 100 karakter!',
        ]);
    }

    /**
     * Fungsi untuk menyimpan data jenis hewan ke database
     */
    private function createJenisHewan($namaJenis)
    {
        JenisHewan::create([
            'nama_jenis_hewan' => $namaJenis,
        ]);
    }

    /**
     * Fungsi untuk memformat huruf nama jenis hewan
     * Contoh: “kucing (felis catus)” → “Kucing (Felis Catus)”
     */
    private function formatNamaJenisHewan($nama)
    {
        // Ubah ke huruf kecil semua lalu kapitalisasi tiap kata
        return ucwords(strtolower($nama));
    }
}
