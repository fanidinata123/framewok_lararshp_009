<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

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
        $formattedName = $this->formatRoleName($validated['nama_role']);
        $this->createRole($formattedName);

        return redirect()->route('admin.role.index')->with('success', 'Role berhasil ditambahkan!');
    }

    private function validateRole(Request $request)
    {
        return $request->validate([
            'nama_role' => 'required|string|max:50'
        ]);
    }

    private function createRole($nama)
    {
        Role::create(['nama_role' => $nama]);
    }

    private function formatRoleName($nama)
    {
        return ucwords(strtolower($nama));
    }
}
