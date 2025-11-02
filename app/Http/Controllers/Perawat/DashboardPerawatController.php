<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;

class DashboardPerawatController extends Controller
{
    public function index()
    {
        
        return view('perawat.dashboard.index');
    }
}
