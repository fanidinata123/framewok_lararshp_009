<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoleUser;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

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
        
        RoleUser::create([
            'idrole_user' => $this->generateNewId(),
            'iduser' => $validated['iduser'],
            'idrole' => $validated['idrole'],
            'status' => $request->input('status', 1), // Ambil dari form, default 1
        ]);

        return redirect()->route('admin.role-user.index')
                         ->with('success', 'Role user berhasil ditambahkan!');
    }

    public function edit(Request $request)
    {
        $id = $request->query('id');
        $roleUser = RoleUser::findOrFail($id);
        $users = User::all();
        $roles = Role::all();
        
        return view('admin.role_user.edit', compact('roleUser', 'users', 'roles'));
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $validated = $this->validateRoleUser($request);

        $roleUser = RoleUser::findOrFail($id);
        $roleUser->update([
            'iduser' => $validated['iduser'],
            'idrole' => $validated['idrole'],
            'status' => $request->input('status', 1),
        ]);

        return redirect()->route('admin.role-user.index')
                         ->with('success', 'Role user berhasil diupdate!');
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        RoleUser::findOrFail($id)->delete();
        
        return redirect()->route('admin.role-user.index')
                         ->with('success', 'Role user berhasil dihapus!');
    }

    private function validateRoleUser(Request $request)
    {
        return $request->validate([
            'iduser' => 'required|exists:user,iduser',
            'idrole' => 'required|exists:role,idrole',
        ], [
            'iduser.required' => 'User harus dipilih!',
            'idrole.required' => 'Role harus dipilih!',
        ]);
    }

    private function generateNewId()
    {
        $maxId = DB::table('role_user')->max('idrole_user');
        return $maxId ? $maxId + 1 : 1;
    }
}