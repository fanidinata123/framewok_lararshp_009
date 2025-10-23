<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;

class PetController extends Controller
{
    public function index()
    {
        // Ambil semua data Pet dengan relasi Pemilik dan Ras Hewan
        $pet = Pet::with(['pemilik.user', 'rasHewan'])->get();
        return view('pet.index', compact('pet'));
    }
}
