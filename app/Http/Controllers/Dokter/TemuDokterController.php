<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TemuDokter;
use App\Models\Pet;
use App\Models\RoleUser;
use Illuminate\Support\Facades\DB;

class TemuDokterController extends Controller
{
    public function index()
    {
        $temu = TemuDokter::with(['pet', 'roleUser'])->orderBy('waktu_daftar', 'asc')->get();
        return view('dokter.temu_dokter.index', compact('temu'));
    }

    public function create()
    {
        $pets = Pet::all();
        $dokters = DB::table('role_user')
            ->join('user', 'role_user.iduser', '=', 'user.iduser')
            ->where('role_user.idrole', 2)
            ->where('role_user.status', 1)
            ->select('role_user.idrole_user','user.iduser','user.nama')
            ->get();

        return view('dokter.temu_dokter.create', compact('pets','dokters'));
    }

    public function store(Request $request)
    {
        $data = $this->validateTemu($request);

        $noUrut = $this->generateNoUrut();

        TemuDokter::create([
            'no_urut' => $noUrut,
            'waktu_daftar' => now(),
            'status' => $data['status'],
            'idpet' => $data['idpet'],
            'idrole_user' => $data['idrole_user']
        ]);

        return redirect()->route('dokter.temu-dokter.index')->with('success','Temu dokter berhasil ditambahkan.');
    }

    public function edit(Request $request)
    {
        $id = $request->query('id');
        $item = TemuDokter::findOrFail($id);
        $pets = Pet::all();
        $dokters = DB::table('role_user')
            ->join('user', 'role_user.iduser', '=', 'user.iduser')
            ->where('role_user.idrole', 2)
            ->where('role_user.status', 1)
            ->select('role_user.idrole_user','user.iduser','user.nama')
            ->get();

        return view('dokter.temu_dokter.edit', compact('item','pets','dokters'));
    }

    public function update(Request $request)
    {
        $data = $this->validateTemu($request);
        $id = $request->input('idreservasi_dokter');
        $row = TemuDokter::findOrFail($id);
        $row->update([
            'no_urut' => $data['no_urut'] ?? $row->no_urut,
            'status' => $data['status'],
            'idpet' => $data['idpet'],
            'idrole_user' => $data['idrole_user'],
        ]);

        return redirect()->route('dokter.temu-dokter.index')->with('success','Data temu dokter diupdate.');
    }

    public function destroy(Request $request)
    {
        $temu = TemuDokter::findOrFail($request->idreservasi_dokter);
        $temu->delete();

        return redirect()->route('dokter.temu-dokter.index')
                         ->with('success', 'Temu dokter berhasil dihapus');
    }

    // TAMBAHKAN METHOD INI
    private function validateTemu(Request $request)
    {
        return $request->validate([
            'status' => 'required|string|max:50',
            'idpet' => 'required|exists:pet,idpet',
            'idrole_user' => 'required|exists:role_user,idrole_user',
            'no_urut' => 'nullable|integer', // untuk update
        ]);
    }

    private function generateNoUrut()
    {
        $max = DB::table('temu_dokter')->max('no_urut');
        return $max ? $max + 1 : 1;
    }
}