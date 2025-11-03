<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Pemilik;
use App\Models\RasHewan;

class PetController extends Controller
{
    /**
     * Tampilkan semua data Pet
     */
    public function index()
    {
        $pets = Pet::with(['pemilik', 'rasHewan'])->get();
        return view('admin.pet.index', compact('pets'));
    }

    /**
     * Form tambah data Pet
     */
    public function create()
    {
        $pemilik = Pemilik::all();
        $rasHewan = RasHewan::all();
        return view('admin.pet.create', compact('pemilik', 'rasHewan'));
    }

    /**
     * Simpan data Pet baru
     */
    public function store(Request $request)
    {
        // 🔹 Validasi data
        $validatedData = $this->validatePet($request);

        // 🔹 Format nama pet
        $validatedData['nama'] = $this->formatNamaPet($validatedData['nama']);

        // 🔹 Simpan data
        $this->createPet($validatedData);

        // 🔹 Redirect
        return redirect()->route('admin.pet.index')
                         ->with('success', 'Data pet berhasil ditambahkan!');
    }

    /**
     * 🔸 Validasi input Pet
     */
    private function validatePet(Request $request)
    {
        return $request->validate([
            'nama' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'warna_tanda' => 'nullable|string|max:100',
            'jenis_kelamin' => 'required|in:Jantan,Betina',
            'idpemilik' => 'required|exists:pemilik,idpemilik',
            'idras_hewan' => 'required|exists:ras_hewan,idras_hewan',
        ]);
    }

    /**
     * 🔸 Helper untuk menambah data Pet
     */
    private function createPet(array $data)
    {
        Pet::create($data);
    }

    /**
     * 🔸 Helper untuk format nama Pet
     */
    private function formatNamaPet($nama)
    {
        return ucwords(strtolower($nama));
    }
}
