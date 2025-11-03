<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
        $formattedName = $this->formatUserName($validated['nama']);
        $this->createUser($formattedName, $validated['email'], $validated['password']);

        return redirect()->route('admin.user.index')->with('success', 'User berhasil ditambahkan!');
    }

    private function validateUser(Request $request)
    {
        return $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:6',
        ]);
    }

    private function createUser($nama, $email, $password)
    {
        User::create([
            'nama' => $nama,
            'email' => $email,
            'password' => Hash::make($password),
        ]);
    }

    private function formatUserName($nama)
    {
        return ucwords(strtolower($nama));
    }
}
