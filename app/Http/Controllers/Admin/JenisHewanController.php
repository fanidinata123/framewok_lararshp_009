<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisHewanController extends Controller
{
    /**
     * -------------------------------------------------------------------------
     * 🔹 INDEX : Menampilkan semua data jenis hewan
     * -------------------------------------------------------------------------
     */
    public function index()
    {
        // Mengambil semua data dari tabel jenis_hewan menggunakan Query Builder
        $jenisHewan = DB::table('jenis_hewan')->get();

        // Mengirim data ke view index
        return view('admin.jenis_hewan.index', compact('jenisHewan'));
    }

    /**
     * -------------------------------------------------------------------------
     * 🔹 CREATE : Menampilkan form input data jenis hewan
     * -------------------------------------------------------------------------
     */
    public function create()
    {
        // Menampilkan halaman form create.blade.php
        return view('admin.jenis_hewan.create');
    }

    /**
     * -------------------------------------------------------------------------
     * 🔹 STORE : Menyimpan data hasil input ke database
     * -------------------------------------------------------------------------
     */
    public function store(Request $request)
    {
        // 1️⃣ Validasi input menggunakan fungsi private
        $validatedData = $this->validateJenisHewan($request);

        // 2️⃣ Format nama jenis hewan (huruf besar tiap kata)
        $formattedName = $this->formatNamaJenisHewan($validatedData['nama_jenis_hewan']);

        // 3️⃣ Simpan data ke database menggunakan Query Builder
        DB::table('jenis_hewan')->insert([
            'nama_jenis_hewan' => $formattedName,
        ]);

        // 4️⃣ Redirect kembali ke halaman index dengan pesan sukses
        return redirect()
            ->route('admin.jenis-hewan.index')
            ->with('success', 'Data jenis hewan berhasil ditambahkan!');
    }

    /**
     * -------------------------------------------------------------------------
     * 🔹 EDIT : Menampilkan form edit data jenis hewan
     * -------------------------------------------------------------------------
     */
    public function edit(Request $request)
    {
        // Ambil ID dari query parameter
        $id = $request->query('id');
        
        // Cari data berdasarkan ID menggunakan Query Builder
        $jenisHewan = DB::table('jenis_hewan')
            ->where('idjenis_hewan', $id)
            ->first();

        // Jika data tidak ditemukan
        if (!$jenisHewan) {
            return redirect()
                ->route('admin.jenis-hewan.index')
                ->with('error', 'Data tidak ditemukan!');
        }

        // Kirim data ke view edit
        return view('admin.jenis_hewan.edit', compact('jenisHewan'));
    }

    /**
     * -------------------------------------------------------------------------
     * 🔹 UPDATE : Mengupdate data jenis hewan
     * -------------------------------------------------------------------------
     */
    public function update(Request $request)
    {
        // 1️⃣ Ambil ID dari request
        $id = $request->input('id');

        // 2️⃣ Validasi input
        $validatedData = $this->validateJenisHewan($request);

        // 3️⃣ Format nama jenis hewan
        $formattedName = $this->formatNamaJenisHewan($validatedData['nama_jenis_hewan']);

        // 4️⃣ Update data menggunakan Query Builder
        $updated = DB::table('jenis_hewan')
            ->where('idjenis_hewan', $id)
            ->update([
                'nama_jenis_hewan' => $formattedName,
            ]);

        // 5️⃣ Redirect dengan pesan sukses atau error
        if ($updated) {
            return redirect()
                ->route('admin.jenis-hewan.index')
                ->with('success', 'Data jenis hewan berhasil diupdate!');
        } else {
            return redirect()
                ->route('admin.jenis-hewan.index')
                ->with('error', 'Gagal mengupdate data!');
        }
    }

    /**
     * -------------------------------------------------------------------------
     * 🔹 DESTROY : Menghapus data jenis hewan
     * -------------------------------------------------------------------------
     */
    public function destroy(Request $request)
    {
        // 1️⃣ Ambil ID dari request
        $id = $request->input('id');

        // 2️⃣ Hapus data menggunakan Query Builder
        $deleted = DB::table('jenis_hewan')
            ->where('idjenis_hewan', $id)
            ->delete();

        // 3️⃣ Redirect dengan pesan sukses atau error
        if ($deleted) {
            return redirect()
                ->route('admin.jenis-hewan.index')
                ->with('success', 'Data jenis hewan berhasil dihapus!');
        } else {
            return redirect()
                ->route('admin.jenis-hewan.index')
                ->with('error', 'Gagal menghapus data!');
        }
    }

    // =========================================================================
    // 🔒 BAGIAN HELPER & VALIDASI
    // =========================================================================

    /**
     * Fungsi private untuk validasi input form
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
     * Fungsi private untuk memformat nama jenis hewan menjadi huruf kapital tiap kata
     * Contoh: "anjing laut" → "Anjing Laut"
     */
    private function formatNamaJenisHewan($nama)
    {
        return ucwords(strtolower($nama));
    }
}