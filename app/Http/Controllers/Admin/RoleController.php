<?php

namespace App\Http\Controllers\Admin; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        // Ambil semua role dengan relasi users
        $role = Role::with('users')->get();

        // Kirim ke view
        return view('admin.role.index', compact('role'));
    }
}
