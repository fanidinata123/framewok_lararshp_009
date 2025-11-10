<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    /**
     * -------------------------------------------------------------------------
     * 🔹 INDEX : Menampilkan semua data kategori
     * -------------------------------------------------------------------------
     */
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.kategori.index', compact('kategori'));
    }

    /**
     * -------------------------------------------------------------------------
     * 🔹 CREATE : Menampilkan form input data kategori
     * -------------------------------------------------------------------------
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * -------------------------------------------------------------------------
     * 🔹 STORE : Menyimpan data hasil input ke database
     * -------------------------------------------------------------------------
     */
    public function store(Request $request)
    {
        // 1️⃣ Validasi input
        $validated = $this->validateKategori($request);
        
        // 2️⃣ Format nama kategori
        $nama = $this->formatNamaKategori($validated['nama_kategori']);
        
        // 3️⃣ Generate ID baru
        $newId = $this->generateNewId();
        
        // 4️⃣ Simpan data dengan ID
        Kategori::create([
            'idkategori' => $newId,
            'nama_kategori' => $nama
        ]);

        return redirect()
            ->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * -------------------------------------------------------------------------
     * 🔹 EDIT : Menampilkan form edit data kategori
     * -------------------------------------------------------------------------
     */
    public function edit(Request $request)
    {
        // Ambil ID dari query parameter
        $id = $request->query('id');
        
        // Cari data berdasarkan ID
        $kategori = Kategori::findOrFail($id);

        // Kirim data ke view edit
        return view('admin.kategori.edit', compact('kategori'));
    }

    /**
     * -------------------------------------------------------------------------
     * 🔹 UPDATE : Mengupdate data kategori
     * -------------------------------------------------------------------------
     */
    public function update(Request $request)
    {
        // 1️⃣ Ambil ID dari request
        $id = $request->input('id');

        // 2️⃣ Validasi input
        $validated = $this->validateKategori($request);

        // 3️⃣ Format nama kategori
        $nama = $this->formatNamaKategori($validated['nama_kategori']);

        // 4️⃣ Update data di database
        $kategori = Kategori::findOrFail($id);
        $kategori->update(['nama_kategori' => $nama]);

        // 5️⃣ Redirect dengan pesan sukses
        return redirect()
            ->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil diupdate!');
    }

    /**
     * -------------------------------------------------------------------------
     * 🔹 DESTROY : Menghapus data kategori
     * -------------------------------------------------------------------------
     */
    public function destroy(Request $request)
    {
        // 1️⃣ Ambil ID dari request
        $id = $request->input('id');

        // 2️⃣ Cari dan hapus data
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        // 3️⃣ Redirect dengan pesan sukses
        return redirect()
            ->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil dihapus!');
    }

    // =========================================================================
    // 🔒 BAGIAN HELPER & VALIDASI
    // =========================================================================

    /**
     * Fungsi private untuk validasi input form
     */
    private function validateKategori(Request $request)
    {
        return $request->validate([
            'nama_kategori' => 'required|string|max:100',
        ], [
            'nama_kategori.required' => 'Nama kategori harus diisi!',
            'nama_kategori.string' => 'Nama kategori harus berupa teks!',
            'nama_kategori.max' => 'Nama kategori maksimal 100 karakter!',
        ]);
    }

    /**
     * Fungsi private untuk memformat nama kategori menjadi huruf kapital tiap kata
     * Contoh: "obat hewan" → "Obat Hewan"
     */
    private function formatNamaKategori($nama)
    {
        return ucwords(strtolower($nama));
    }

    /**
     * Fungsi private untuk generate ID baru (manual)
     * Mengambil MAX ID yang ada, lalu tambah 1
     */
    private function generateNewId()
    {
        $maxId = DB::table('kategori')->max('idkategori');
        return $maxId ? $maxId + 1 : 1;
    }
}