<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IsDokter
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        $role = DB::table('role_user')
            ->join('role', 'role.idrole', '=', 'role_user.idrole')
            ->where('role_user.iduser', $user->iduser)
            ->where('role_user.status', 1)
            ->select('role.nama_role')
            ->first();

        if (!$role || $role->nama_role !== 'Dokter') {
            return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}
