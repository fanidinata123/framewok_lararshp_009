<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KodeTindakanTerapi;
use App\Models\Kategori;
use App\Models\KategoriKlinis;
use Illuminate\Support\Facades\DB;

class KodeTindakanTerapiController extends Controller
{
    /**
     * -------------------------------------------------------------------------
     * 🔹 INDEX : Menampilkan semua data kode tindakan terapi
     * -------------------------------------------------------------------------
     */
    public function index()
    {
        $kodeTindakan = KodeTindakanTerapi::with(['kategori', 'kategoriKlinis'])->get();
        return view('admin.kode_tindakan.index', compact('kodeTindakan'));
    }

    /**
     * -------------------------------------------------------------------------
     * 🔹 CREATE : Menampilkan form input data kode tindakan
     * -------------------------------------------------------------------------
     */
    public function create()
    {
        $kategori = Kategori::all();
        $kategoriKlinis = KategoriKlinis::all();
        return view('admin.kode_tindakan.create', compact('kategori', 'kategoriKlinis'));
    }

    /**
     * -------------------------------------------------------------------------
     * 🔹 STORE : Menyimpan data hasil input ke database
     * -------------------------------------------------------------------------
     */
    public function store(Request $request)
    {
        // 1️⃣ Validasi input
        $validated = $this->validateKodeTindakan($request);
        
        // 2️⃣ Format data
        $kode = strtoupper($validated['kode']);
        $deskripsi = $this->formatDeskripsi($validated['deskripsi_tindakan_terapi']);
        
        // 3️⃣ Generate ID baru
        $newId = $this->generateNewId();
        
        // 4️⃣ Simpan data dengan ID
        KodeTindakanTerapi::create([
            'idkode_tindakan_terapi' => $newId,
            'kode' => $kode,
            'deskripsi_tindakan_terapi' => $deskripsi,
            'idkategori' => $validated['idkategori'],
            'idkategori_klinis' => $validated['idkategori_klinis'],
        ]);

        return redirect()
            ->route('admin.kode-tindakan.index')
            ->with('success', 'Kode tindakan berhasil ditambahkan!');
    }

    /**
     * -------------------------------------------------------------------------
     * 🔹 EDIT : Menampilkan form edit data kode tindakan
     * -------------------------------------------------------------------------
     */
    public function edit(Request $request)
    {
        // Ambil ID dari query parameter
        $id = $request->query('id');
        
        // Cari data berdasarkan ID
        $kodeTindakan = KodeTindakanTerapi::findOrFail($id);
        $kategori = Kategori::all();
        $kategoriKlinis = KategoriKlinis::all();

        // Kirim data ke view edit
        return view('admin.kode_tindakan.edit', compact('kodeTindakan', 'kategori', 'kategoriKlinis'));
    }

    /**
     * -------------------------------------------------------------------------
     * 🔹 UPDATE : Mengupdate data kode tindakan
     * -------------------------------------------------------------------------
     */
    public function update(Request $request)
    {
        // 1️⃣ Ambil ID dari request
        $id = $request->input('id');

        // 2️⃣ Validasi input (kecuali unique kode untuk data yang sama)
        $validated = $this->validateKodeTindakan($request, $id);

        // 3️⃣ Format data
        $kode = strtoupper($validated['kode']);
        $deskripsi = $this->formatDeskripsi($validated['deskripsi_tindakan_terapi']);

        // 4️⃣ Update data di database
        $kodeTindakan = KodeTindakanTerapi::findOrFail($id);
        $kodeTindakan->update([
            'kode' => $kode,
            'deskripsi_tindakan_terapi' => $deskripsi,
            'idkategori' => $validated['idkategori'],
            'idkategori_klinis' => $validated['idkategori_klinis'],
        ]);

        // 5️⃣ Redirect dengan pesan sukses
        return redirect()
            ->route('admin.kode-tindakan.index')
            ->with('success', 'Kode tindakan berhasil diupdate!');
    }

    /**
     * -------------------------------------------------------------------------
     * 🔹 DESTROY : Menghapus data kode tindakan
     * -------------------------------------------------------------------------
     */
    public function destroy(Request $request)
    {
        // 1️⃣ Ambil ID dari request
        $id = $request->input('id');

        // 2️⃣ Cari dan hapus data
        $kodeTindakan = KodeTindakanTerapi::findOrFail($id);
        $kodeTindakan->delete();

        // 3️⃣ Redirect dengan pesan sukses
        return redirect()
            ->route('admin.kode-tindakan.index')
            ->with('success', 'Kode tindakan berhasil dihapus!');
    }

    // =========================================================================
    // 🔒 BAGIAN HELPER & VALIDASI
    // =========================================================================

    /**
     * Fungsi private untuk validasi input form
     */
    private function validateKodeTindakan(Request $request, $id = null)
    {
        $rules = [
            'kode' => 'required|string|max:20|unique:kode_tindakan_terapi,kode' . ($id ? ",$id,idkode_tindakan_terapi" : ''),
            'deskripsi_tindakan_terapi' => 'required|string|max:255',
            'idkategori' => 'required|exists:kategori,idkategori',
            'idkategori_klinis' => 'required|exists:kategori_klinis,idkategori_klinis',
        ];

        $messages = [
            'kode.required' => 'Kode tindakan harus diisi!',
            'kode.unique' => 'Kode tindakan sudah digunakan!',
            'kode.max' => 'Kode tindakan maksimal 20 karakter!',
            'deskripsi_tindakan_terapi.required' => 'Deskripsi tindakan harus diisi!',
            'deskripsi_tindakan_terapi.max' => 'Deskripsi maksimal 255 karakter!',
            'idkategori.required' => 'Kategori harus dipilih!',
            'idkategori.exists' => 'Kategori tidak valid!',
            'idkategori_klinis.required' => 'Kategori klinis harus dipilih!',
            'idkategori_klinis.exists' => 'Kategori klinis tidak valid!',
        ];

        return $request->validate($rules, $messages);
    }

    /**
     * Fungsi private untuk memformat deskripsi menjadi huruf kapital tiap kata
     */
    private function formatDeskripsi($deskripsi)
    {
        return ucwords(strtolower($deskripsi));
    }

    /**
     * Fungsi private untuk generate ID baru (manual)
     * Mengambil MAX ID yang ada, lalu tambah 1
     */
    private function generateNewId()
    {
        $maxId = DB::table('kode_tindakan_terapi')->max('idkode_tindakan_terapi');
        return $maxId ? $maxId + 1 : 1;
    }
}