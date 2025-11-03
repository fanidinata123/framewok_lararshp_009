<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoleUser;
use App\Models\User;
use App\Models\Role;

class RoleUserController extends Controller
{
    public function index()
    {
        $roleUser = RoleUser::with(['user', 'role'])->get();
        return view('admin.role_user.index', compact('roleUser'));
    }

    public function create()
    {
        $users = User::all();
        $roles = Role::all();
        return view('admin.role_user.create', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateRoleUser($request);
        $this->createRoleUser($validated['iduser'], $validated['idrole']);

        return redirect()->route('admin.role-user.index')->with('success', 'Role user berhasil ditambahkan!');
    }

    private function validateRoleUser(Request $request)
    {
        return $request->validate([
            'iduser' => 'required|integer',
            'idrole' => 'required|integer',
        ]);
    }

    private function createRoleUser($iduser, $idrole)
    {
        RoleUser::create([
            'iduser' => $iduser,
            'idrole' => $idrole,
            'status' => 1,
        ]);
    }
}
