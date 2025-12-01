<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemilik;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PemilikController extends Controller
{
    public function index()
    {
        $pemilik = Pemilik::with('user')->get();
        return view('resepsionis.pemilik.index', compact('pemilik'));
    }

    public function create()
    {
        $user = User::all();
        return view('resepsionis.pemilik.create', compact('user'));
    }

    public function store(Request $request)
    {
        $validated = $this->validatePemilik($request);
        $newId = $this->generateNewId();

        Pemilik::create([
            'idpemilik' => $newId,
            'no_wa' => $validated['no_wa'],
            'alamat' => ucwords(strtolower($validated['alamat'])),
            'iduser' => $validated['iduser'],
        ]);

        return redirect()->route('resepsionis.pemilik.index')
            ->with('success', 'Data pemilik berhasil ditambahkan!');
    }

    public function edit(Request $request)
    {
        $id = $request->query('id');
        $pemilik = Pemilik::findOrFail($id);
        $user = User::all();

        return view('resepsionis.pemilik.edit', compact('pemilik', 'user'));
    }

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

        return redirect()->route('resepsionis.pemilik.index')
            ->with('success', 'Data pemilik berhasil diupdate!');
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $pemilik = Pemilik::findOrFail($id);
        $pemilik->delete();

        return redirect()->route('resepsionis.pemilik.index')
            ->with('success', 'Data pemilik berhasil dihapus!');
    }

    private function validatePemilik(Request $request, $id = null)
    {
        return $request->validate([
            'no_wa' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
            'iduser' => 'required|exists:user,iduser',
        ]);
    }

    private function generateNewId()
    {
        $maxId = DB::table('pemilik')->max('idpemilik');
        return $maxId ? $maxId + 1 : 1;
    }
}