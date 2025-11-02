<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $role = DB::table('role_user')->where('iduser', $user->iduser)->value('idrole');

        if ($role == 1) {
            return redirect()->route('admin.dashboard');
        } elseif ($role == 2) {
            return redirect()->route('resepsionis.dashboard');
        }

        return view('home');
    }
}
