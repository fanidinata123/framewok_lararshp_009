<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardAdminController extends Controller
{
    public function index()
    {
        // arahkan ke folder views/admin/dashboard/index.blade.php
        return view('admin.dashboard.index');
    }
}
