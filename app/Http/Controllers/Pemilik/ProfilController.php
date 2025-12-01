<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index()
    {
        $iduser = Auth::id();
        
        $user = DB::table('user')->where('iduser', $iduser)->first();
        $pemilik = DB::table('pemilik')->where('iduser', $iduser)->first();

        return view('pemilik.profil.index', compact('user', 'pemilik'));
    }

    public function update(Request $request)
    {
        $iduser = Auth::id();

        $validated = $request->validate([
            'nama' => 'required|string|max:500',
            'email' => 'required|email|max:200|unique:user,email,' . $iduser . ',iduser',
            'no_wa' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
            'password' => 'nullable|min:6|confirmed',
        ]);

        // Update user
        $userData = [
            'nama' => $validated['nama'],
            'email' => $validated['email'],
        ];

        if (!empty($validated['password'])) {
            $userData['password'] = Hash::make($validated['password']);
        }

        DB::table('user')->where('iduser', $iduser)->update($userData);

        // Update pemilik
        $pemilik = DB::table('pemilik')->where('iduser', $iduser)->first();
        
        if ($pemilik) {
            DB::table('pemilik')->where('iduser', $iduser)->update([
                'no_wa' => $validated['no_wa'],
                'alamat' => $validated['alamat'],
            ]);
        }

        return redirect()->route('pemilik.profil.index')
            ->with('success', 'Profil berhasil diupdate!');
    }
}