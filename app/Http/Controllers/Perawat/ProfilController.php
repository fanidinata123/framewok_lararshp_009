<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Ambil data role user perawat
        $roleUser = DB::table('role_user')
            ->join('role', 'role_user.idrole', '=', 'role.idrole')
            ->where('role_user.iduser', $user->iduser)
            ->where('role_user.idrole', 3) // 3 = Perawat
            ->where('role_user.status', 1)
            ->select('role_user.*', 'role.nama_role')
            ->first();

        // Ambil data perawat dari tabel perawat
        $perawat = DB::table('perawat')
            ->where('id_user', $user->iduser)
            ->first();

        // TAMPILKAN SEMUA DATA
        $countRekamMedis = DB::table('rekam_medis')->count();
        $countDetailRekamMedis = DB::table('detail_rekam_medis')->count();

        return view('perawat.profil.index', compact('user', 'roleUser', 'perawat', 'countRekamMedis', 'countDetailRekamMedis'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'nama' => 'required|string|max:500',
            'email' => 'required|email|max:200|unique:user,email,' . $user->iduser . ',iduser',
            'password' => 'nullable|string|min:6|confirmed',
            'alamat' => 'nullable|string|max:100',
            'no_hp' => 'nullable|string|max:45',
            'pendidikan' => 'nullable|string|max:100',
            'jenis_kelamin' => 'nullable|in:L,P',
        ]);

        // Update data user
        DB::table('user')
            ->where('iduser', $user->iduser)
            ->update([
                'nama' => $validated['nama'],
                'email' => $validated['email'],
            ]);

        // Update password jika diisi
        if (!empty($validated['password'])) {
            DB::table('user')
                ->where('iduser', $user->iduser)
                ->update([
                    'password' => Hash::make($validated['password']),
                ]);
        }

        // Update atau insert data perawat
        $perawatExists = DB::table('perawat')->where('id_user', $user->iduser)->exists();

        if ($perawatExists) {
            // Update data perawat yang sudah ada
            DB::table('perawat')
                ->where('id_user', $user->iduser)
                ->update([
                    'alamat' => $validated['alamat'],
                    'no_hp' => $validated['no_hp'],
                    'pendidikan' => $validated['pendidikan'],
                    'jenis_kelamin' => $validated['jenis_kelamin'],
                ]);
        } else {
            // Insert data perawat baru
            DB::table('perawat')->insert([
                'id_user' => $user->iduser,
                'alamat' => $validated['alamat'],
                'no_hp' => $validated['no_hp'],
                'pendidikan' => $validated['pendidikan'],
                'jenis_kelamin' => $validated['jenis_kelamin'],
            ]);
        }

        return redirect()->route('perawat.profil')
            ->with('success', 'Profil berhasil diperbarui');
    }
}