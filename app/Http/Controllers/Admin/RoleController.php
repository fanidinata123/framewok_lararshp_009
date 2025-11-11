<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateRole($request);
        
        Role::create([
            'idrole' => $this->generateNewId(),
            'nama_role' => $this->formatRoleName($validated['nama_role'])
        ]);

        return redirect()->route('admin.role.index')
                         ->with('success', 'Role berhasil ditambahkan!');
    }

    public function edit(Request $request)
    {
        $id = $request->query('id');
        $role = Role::findOrFail($id);
        return view('admin.role.edit', compact('role'));
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $validated = $this->validateRole($request);

        $role = Role::findOrFail($id);
        $role->update([
            'nama_role' => $this->formatRoleName($validated['nama_role'])
        ]);

        return redirect()->route('admin.role.index')
                         ->with('success', 'Role berhasil diupdate!');
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        Role::findOrFail($id)->delete();
        
        return redirect()->route('admin.role.index')
                         ->with('success', 'Role berhasil dihapus!');
    }

    private function validateRole(Request $request)
    {
        return $request->validate([
            'nama_role' => 'required|string|max:50'
        ], [
            'nama_role.required' => 'Nama role harus diisi!'
        ]);
    }

    private function formatRoleName($nama)
    {
        return ucwords(strtolower($nama));
    }

    private function generateNewId()
    {
        $maxId = DB::table('role')->max('idrole');
        return $maxId ? $maxId + 1 : 1;
    }
}