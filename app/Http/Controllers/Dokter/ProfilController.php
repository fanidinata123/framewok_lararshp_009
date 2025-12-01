<?php

namespace App\Http\Controllers\Dokter;

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
        
        // Ambil data role user dokter
        $roleUser = DB::table('role_user')
            ->join('role', 'role_user.idrole', '=', 'role.idrole')
            ->where('role_user.iduser', $user->iduser)
            ->where('role_user.idrole', 2) // 2 = Dokter
            ->where('role_user.status', 1)
            ->select('role_user.*', 'role.nama_role')
            ->first();

        // Ambil data dokter dari tabel dokter (dengan nama kolom sesuai database)
        $dokter = DB::table('dokter')
            ->where('id_user', $user->iduser)
            ->first();

        // TAMPILKAN SEMUA DATA (tidak difilter per dokter)
        $countRekamMedis = DB::table('rekam_medis')->count();
        $countTemuDokter = DB::table('temu_dokter')->count();

        return view('dokter.profil.index', compact('user', 'roleUser', 'dokter', 'countRekamMedis', 'countTemuDokter'));
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
            'bidang_dokter' => 'nullable|string|max:100',
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

        // Update atau insert data dokter
        $dokterExists = DB::table('dokter')->where('id_user', $user->iduser)->exists();

        if ($dokterExists) {
            // Update data dokter yang sudah ada
            DB::table('dokter')
                ->where('id_user', $user->iduser)
                ->update([
                    'alamat' => $validated['alamat'],
                    'no_hp' => $validated['no_hp'],
                    'bidang_dokter' => $validated['bidang_dokter'],
                    'jenis_kelamin' => $validated['jenis_kelamin'],
                ]);
        } else {
            // Insert data dokter baru
            DB::table('dokter')->insert([
                'id_user' => $user->iduser,
                'alamat' => $validated['alamat'],
                'no_hp' => $validated['no_hp'],
                'bidang_dokter' => $validated['bidang_dokter'],
                'jenis_kelamin' => $validated['jenis_kelamin'],
            ]);
        }

        return redirect()->route('dokter.profil')
            ->with('success', 'Profil berhasil diperbarui');
    }
}