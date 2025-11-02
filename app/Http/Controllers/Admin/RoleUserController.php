<?php

namespace App\Http\Controllers\Admin; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RoleUserController extends Controller
{
    public function index()
    {
        // Ambil semua user dengan relasi roles
        $user = User::with('roles')->get();

        // Kirim ke view
        return view('admin.role_user.index', compact('user'));
    }
}
