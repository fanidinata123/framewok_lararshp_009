<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Pet;

class PetController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $pets = Pet::with(['rasHewan', 'pemilik'])
                    ->whereHas('pemilik', function($q) use ($user) {
                        $q->where('iduser', $user->iduser);
                    })
                    ->get();

        return view('pemilik.pet.index', compact('pets'));
    }
}
