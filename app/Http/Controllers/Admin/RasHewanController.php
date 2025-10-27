<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RasHewan;

class RasHewanController extends Controller
{
    public function index()
    {
        $ras = RasHewan::with('jenisHewan')->get();
        return view('ras_hewan.index', compact('ras'));
    }
}
