<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin.user.index', compact('user'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateUser($request);
        
        User::create([
            'iduser' => $this->generateNewId(),
            'nama' => $this->formatUserName($validated['nama']),
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('admin.user.index')
                         ->with('success', 'User berhasil ditambahkan!');
    }

    public function edit(Request $request)
    {
        $id = $request->query('id');
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:user,email,' . $id . ',iduser',
            'password' => 'nullable|min:6',
        ], [
            'nama.required' => 'Nama harus diisi!',
            'email.required' => 'Email harus diisi!',
            'email.unique' => 'Email sudah digunakan!',
        ]);

        $dataUpdate = [
            'nama' => $this->formatUserName($validated['nama']),
            'email' => $validated['email'],
        ];

        // Update password hanya jika diisi
        if (!empty($validated['password'])) {
            $dataUpdate['password'] = Hash::make($validated['password']);
        }

        $user->update($dataUpdate);

        return redirect()->route('admin.user.index')
                         ->with('success', 'User berhasil diupdate!');
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        User::findOrFail($id)->delete();
        
        return redirect()->route('admin.user.index')
                         ->with('success', 'User berhasil dihapus!');
    }

    private function validateUser(Request $request)
    {
        return $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:6',
        ], [
            'nama.required' => 'Nama harus diisi!',
            'email.required' => 'Email harus diisi!',
            'email.unique' => 'Email sudah digunakan!',
            'password.required' => 'Password harus diisi!',
            'password.min' => 'Password minimal 6 karakter!',
        ]);
    }

    private function formatUserName($nama)
    {
        return ucwords(strtolower($nama));
    }

    private function generateNewId()
    {
        $maxId = DB::table('user')->max('iduser');
        return $maxId ? $maxId + 1 : 1;
    }
}