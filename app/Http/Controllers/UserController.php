<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // Mengambil semua data user beserta data pemilik
        $user = User::with('pemilik')->get();

        // Mengirim data ke view
        return view('user.index', compact('user'));
    }
}
