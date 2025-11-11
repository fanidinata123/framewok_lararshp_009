<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemilik;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PemilikController extends Controller
{
    /**
     * -------------------------------------------------------------------------
     * 🔹 INDEX : Menampilkan semua data pemilik
     * -------------------------------------------------------------------------
     */
    public function index()
    {
        $pemilik = Pemilik::with('user')->get();
        return view('admin.pemilik.index', compact('pemilik'));
    }

    /**
     * -------------------------------------------------------------------------
     * 🔹 CREATE : Menampilkan form tambah pemilik
     * -------------------------------------------------------------------------
     */
    public function create()
    {
        $user = User::all();
        return view('admin.pemilik.create', compact('user'));
    }

    /**
     * -------------------------------------------------------------------------
     * 🔹 STORE : Menyimpan data pemilik baru
     * -------------------------------------------------------------------------
     */
    public function store(Request $request)
    {
        // 1️⃣ Validasi input
        $validated = $this->validatePemilik($request);

        // 2️⃣ Format data
        $alamat = ucwords(strtolower($validated['alamat']));
        $no_wa = $validated['no_wa'];
        $iduser = $validated['iduser'];

        // 3️⃣ Generate ID baru (manual)
        $newId = $this->generateNewId();

        // 4️⃣ Simpan data ke tabel pemilik
        Pemilik::create([
            'idpemilik' => $newId,
            'no_wa' => $no_wa,
            'alamat' => $alamat,
            'iduser' => $iduser,
        ]);

        return redirect()
            ->route('admin.pemilik.index')
            ->with('success', 'Data pemilik berhasil ditambahkan!');
    }

    /**
     * -------------------------------------------------------------------------
     * 🔹 EDIT : Menampilkan form edit pemilik
     * -------------------------------------------------------------------------
     */
    public function edit(Request $request)
    {
        $id = $request->query('id');
        $pemilik = Pemilik::findOrFail($id);
        $user = User::all();

        return view('admin.pemilik.edit', compact('pemilik', 'user'));
    }

    /**
     * -------------------------------------------------------------------------
     * 🔹 UPDATE : Mengupdate data pemilik
     * -------------------------------------------------------------------------
     */
    public function update(Request $request)
    {
        $id = $request->input('id');
        $validated = $this->validatePemilik($request, $id);

        $pemilik = Pemilik::findOrFail($id);
        $pemilik->update([
            'no_wa' => $validated['no_wa'],
            'alamat' => ucwords(strtolower($validated['alamat'])),
            'iduser' => $validated['iduser'],
        ]);

        return redirect()
            ->route('admin.pemilik.index')
            ->with('success', 'Data pemilik berhasil diupdate!');
    }

    /**
     * -------------------------------------------------------------------------
     * 🔹 DESTROY : Menghapus data pemilik
     * -------------------------------------------------------------------------
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $pemilik = Pemilik::findOrFail($id);
        $pemilik->delete();

        return redirect()
            ->route('admin.pemilik.index')
            ->with('success', 'Data pemilik berhasil dihapus!');
    }

    // =========================================================================
    // 🔒 HELPER & VALIDASI
    // =========================================================================

    private function validatePemilik(Request $request, $id = null)
    {
        return $request->validate([
            'no_wa' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
            'iduser' => 'required|exists:user,iduser',
        ], [
            'no_wa.required' => 'Nomor WA harus diisi!',
            'alamat.required' => 'Alamat harus diisi!',
            'iduser.required' => 'Pemilik harus dihubungkan dengan user!',
        ]);
    }

    private function generateNewId()
    {
        $maxId = DB::table('pemilik')->max('idpemilik');
        return $maxId ? $maxId + 1 : 1;
    }
}
