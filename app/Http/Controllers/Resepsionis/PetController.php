<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Pemilik;
use App\Models\RasHewan;
use Illuminate\Support\Facades\DB;

class PetController extends Controller
{
    public function index()
    {
        $pets = Pet::with(['pemilik.user', 'rasHewan.jenisHewan'])->get();
        return view('resepsionis.pet.index', compact('pets'));
    }

    public function create()
    {
        $pemilik = Pemilik::with('user')->get();
        $rasHewan = RasHewan::with('jenisHewan')->get();
        return view('resepsionis.pet.create', compact('pemilik', 'rasHewan'));
    }

    public function store(Request $request)
    {
        $validatedData = $this->validatePet($request);
        $validatedData['nama'] = ucwords(strtolower($validatedData['nama']));
        $validatedData['jenis_kelamin'] = $this->convertJenisKelamin($validatedData['jenis_kelamin']);
        $validatedData['idpet'] = $this->generateNewId();

        Pet::create($validatedData);

        return redirect()->route('resepsionis.pet.index')
            ->with('success', 'Data pet berhasil ditambahkan!');
    }

    public function edit(Request $request)
    {
        $id = $request->query('id');
        $pet = Pet::findOrFail($id);
        $pemilik = Pemilik::with('user')->get();
        $rasHewan = RasHewan::with('jenisHewan')->get();
        
        return view('resepsionis.pet.edit', compact('pet', 'pemilik', 'rasHewan'));
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $validatedData = $this->validatePet($request);
        $validatedData['nama'] = ucwords(strtolower($validatedData['nama']));
        $validatedData['jenis_kelamin'] = $this->convertJenisKelamin($validatedData['jenis_kelamin']);

        $pet = Pet::findOrFail($id);
        $pet->update($validatedData);

        return redirect()->route('resepsionis.pet.index')
            ->with('success', 'Data pet berhasil diupdate!');
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $pet = Pet::findOrFail($id);
        $pet->delete();

        return redirect()->route('resepsionis.pet.index')
            ->with('success', 'Data pet berhasil dihapus!');
    }

    private function validatePet(Request $request)
    {
        return $request->validate([
            'nama' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'warna_tanda' => 'nullable|string|max:100',
            'jenis_kelamin' => 'required|in:L,J,Jantan,Betina',
            'idpemilik' => 'required|exists:pemilik,idpemilik',
            'idras_hewan' => 'required|exists:ras_hewan,idras_hewan',
        ]);
    }

    private function convertJenisKelamin($jenisKelamin)
    {
        $jenisKelamin = strtoupper($jenisKelamin);
        if ($jenisKelamin == 'JANTAN') return 'J';
        if ($jenisKelamin == 'BETINA') return 'L';
        return $jenisKelamin;
    }

    private function generateNewId()
    {
        $maxId = DB::table('pet')->max('idpet');
        return $maxId ? $maxId + 1 : 1;
    }
}