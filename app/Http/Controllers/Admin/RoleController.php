<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        // Ambil semua role dengan relasi users
        $role = Role::with('users')->get();

        // Kirim ke view
        return view('role.index', compact('role'));
    }
}
