<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Pemilik;
use App\Models\RasHewan;
use Illuminate\Support\Facades\DB;

class PetController extends Controller
{
    /**
     * Tampilkan semua data Pet
     */
    public function index()
    {
        // Load relasi: pemilik.user (nama ada di user)
        $pets = Pet::with(['pemilik.user', 'rasHewan.jenisHewan'])->get();
        return view('admin.pet.index', compact('pets'));
    }

    /**
     * Form tambah data Pet
     */
    public function create()
    {
        $pemilik = Pemilik::with('user')->get();
        $rasHewan = RasHewan::with('jenisHewan')->get();
        return view('admin.pet.create', compact('pemilik', 'rasHewan'));
    }

    /**
     * Simpan data Pet baru
     */
    public function store(Request $request)
    {
        // 1️⃣ Validasi data
        $validatedData = $this->validatePet($request);

        // 2️⃣ Format nama pet
        $validatedData['nama'] = $this->formatNamaPet($validatedData['nama']);
        
        // 3️⃣ Convert jenis kelamin ke format database (L/J)
        $validatedData['jenis_kelamin'] = $this->convertJenisKelamin($validatedData['jenis_kelamin']);

        // 4️⃣ Generate ID baru
        $validatedData['idpet'] = $this->generateNewId();

        // 5️⃣ Simpan data
        Pet::create($validatedData);

        // 6️⃣ Redirect
        return redirect()->route('admin.pet.index')
                         ->with('success', 'Data pet berhasil ditambahkan!');
    }

    /**
     * Form edit data Pet
     */
    public function edit(Request $request)
    {
        $id = $request->query('id');
        $pet = Pet::findOrFail($id);
        $pemilik = Pemilik::with('user')->get();
        $rasHewan = RasHewan::with('jenisHewan')->get();
        
        return view('admin.pet.edit', compact('pet', 'pemilik', 'rasHewan'));
    }

    /**
     * Update data Pet
     */
    public function update(Request $request)
    {
        // 1️⃣ Ambil ID dari request
        $id = $request->input('id');

        // 2️⃣ Validasi data
        $validatedData = $this->validatePet($request);

        // 3️⃣ Format nama pet
        $validatedData['nama'] = $this->formatNamaPet($validatedData['nama']);
        
        // 4️⃣ Convert jenis kelamin ke format database (L/J)
        $validatedData['jenis_kelamin'] = $this->convertJenisKelamin($validatedData['jenis_kelamin']);

        // 5️⃣ Update data
        $pet = Pet::findOrFail($id);
        $pet->update($validatedData);

        // 6️⃣ Redirect
        return redirect()->route('admin.pet.index')
                         ->with('success', 'Data pet berhasil diupdate!');
    }

    /**
     * Hapus data Pet
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $pet = Pet::findOrFail($id);
        $pet->delete();

        return redirect()->route('admin.pet.index')
                         ->with('success', 'Data pet berhasil dihapus!');
    }

    // =========================================================================
    // HELPER FUNCTIONS
    // =========================================================================

    /**
     * Validasi input Pet
     */
    private function validatePet(Request $request)
    {
        return $request->validate([
            'nama' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'warna_tanda' => 'nullable|string|max:100',
            'jenis_kelamin' => 'required|in:L,J,Jantan,Betina',
            'idpemilik' => 'required|exists:pemilik,idpemilik',
            'idras_hewan' => 'required|exists:ras_hewan,idras_hewan',
        ], [
            'nama.required' => 'Nama pet harus diisi!',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi!',
            'jenis_kelamin.required' => 'Jenis kelamin harus dipilih!',
            'idpemilik.required' => 'Pemilik harus dipilih!',
            'idras_hewan.required' => 'Ras hewan harus dipilih!',
        ]);
    }

    /**
     * Format nama Pet
     */
    private function formatNamaPet($nama)
    {
        return ucwords(strtolower($nama));
    }

    /**
     * Convert jenis kelamin ke format database
     * Jantan/J -> J
     * Betina/L -> L
     */
    private function convertJenisKelamin($jenisKelamin)
    {
        $jenisKelamin = strtoupper($jenisKelamin);
        
        if ($jenisKelamin == 'JANTAN') return 'J';
        if ($jenisKelamin == 'BETINA') return 'L';
        if ($jenisKelamin == 'J') return 'J';
        if ($jenisKelamin == 'L') return 'L';
        
        return 'J'; // Default
    }

    /**
     * Generate ID baru
     */
    private function generateNewId()
    {
        $maxId = DB::table('pet')->max('idpet');
        return $maxId ? $maxId + 1 : 1;
    }
}