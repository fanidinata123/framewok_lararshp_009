<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriKlinis;
use Illuminate\Support\Facades\DB;

class KategoriKlinisController extends Controller
{
    /**
     * -------------------------------------------------------------------------
     * 🔹 INDEX : Menampilkan semua data kategori klinis
     * -------------------------------------------------------------------------
     */
    public function index()
    {
        $kategoriKlinis = KategoriKlinis::all();
        return view('admin.kategori_klinis.index', compact('kategoriKlinis'));
    }

    /**
     * -------------------------------------------------------------------------
     * 🔹 CREATE : Menampilkan form input data kategori klinis
     * -------------------------------------------------------------------------
     */
    public function create()
    {
        return view('admin.kategori_klinis.create');
    }

    /**
     * -------------------------------------------------------------------------
     * 🔹 STORE : Menyimpan data hasil input ke database
     * -------------------------------------------------------------------------
     */
    public function store(Request $request)
    {
        // 1️⃣ Validasi input
        $validated = $this->validateKategoriKlinis($request);
        
        // 2️⃣ Format nama kategori klinis
        $nama = $this->formatNamaKategoriKlinis($validated['nama_kategori_klinis']);
        
        // 3️⃣ Generate ID baru
        $newId = $this->generateNewId();
        
        // 4️⃣ Simpan data dengan ID
        KategoriKlinis::create([
            'idkategori_klinis' => $newId,
            'nama_kategori_klinis' => $nama
        ]);

        return redirect()
            ->route('admin.kategori-klinis.index')
            ->with('success', 'Kategori klinis berhasil ditambahkan!');
    }

    /**
     * -------------------------------------------------------------------------
     * 🔹 EDIT : Menampilkan form edit data kategori klinis
     * -------------------------------------------------------------------------
     */
    public function edit(Request $request)
    {
        // Ambil ID dari query parameter
        $id = $request->query('id');
        
        // Cari data berdasarkan ID
        $kategoriKlinis = KategoriKlinis::findOrFail($id);

        // Kirim data ke view edit
        return view('admin.kategori_klinis.edit', compact('kategoriKlinis'));
    }

    /**
     * -------------------------------------------------------------------------
     * 🔹 UPDATE : Mengupdate data kategori klinis
     * -------------------------------------------------------------------------
     */
    public function update(Request $request)
    {
        // 1️⃣ Ambil ID dari request
        $id = $request->input('id');

        // 2️⃣ Validasi input
        $validated = $this->validateKategoriKlinis($request);

        // 3️⃣ Format nama kategori klinis
        $nama = $this->formatNamaKategoriKlinis($validated['nama_kategori_klinis']);

        // 4️⃣ Update data di database
        $kategoriKlinis = KategoriKlinis::findOrFail($id);
        $kategoriKlinis->update(['nama_kategori_klinis' => $nama]);

        // 5️⃣ Redirect dengan pesan sukses
        return redirect()
            ->route('admin.kategori-klinis.index')
            ->with('success', 'Kategori klinis berhasil diupdate!');
    }

    /**
     * -------------------------------------------------------------------------
     * 🔹 DESTROY : Menghapus data kategori klinis
     * -------------------------------------------------------------------------
     */
    public function destroy(Request $request)
    {
        // 1️⃣ Ambil ID dari request
        $id = $request->input('id');

        // 2️⃣ Cari dan hapus data
        $kategoriKlinis = KategoriKlinis::findOrFail($id);
        $kategoriKlinis->delete();

        // 3️⃣ Redirect dengan pesan sukses
        return redirect()
            ->route('admin.kategori-klinis.index')
            ->with('success', 'Kategori klinis berhasil dihapus!');
    }

    // =========================================================================
    // 🔒 BAGIAN HELPER & VALIDASI
    // =========================================================================

    /**
     * Fungsi private untuk validasi input form
     */
    private function validateKategoriKlinis(Request $request)
    {
        return $request->validate([
            'nama_kategori_klinis' => 'required|string|max:100',
        ], [
            'nama_kategori_klinis.required' => 'Nama kategori klinis harus diisi!',
            'nama_kategori_klinis.string' => 'Nama kategori klinis harus berupa teks!',
            'nama_kategori_klinis.max' => 'Nama kategori klinis maksimal 100 karakter!',
        ]);
    }

    /**
     * Fungsi private untuk memformat nama kategori klinis menjadi huruf kapital tiap kata
     * Contoh: "penyakit kulit" → "Penyakit Kulit"
     */
    private function formatNamaKategoriKlinis($nama)
    {
        return ucwords(strtolower($nama));
    }

    /**
     * Fungsi private untuk generate ID baru (manual)
     * Mengambil MAX ID yang ada, lalu tambah 1
     */
    private function generateNewId()
    {
        $maxId = DB::table('kategori_klinis')->max('idkategori_klinis');
        return $maxId ? $maxId + 1 : 1;
    }
}