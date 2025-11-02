<?php

namespace App\Http\Controllers\Admin; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;

class PetController extends Controller
{
    public function index()
    {
        // Ambil semua data Pet dengan relasi Pemilik dan Ras Hewan
        $pet = Pet::with(['pemilik.user', 'rasHewan'])->get();
        return view('admin.pet.index', compact('pet'));
    }
}
