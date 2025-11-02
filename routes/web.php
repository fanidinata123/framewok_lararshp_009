<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Dokter\DashboardDokterController;
use App\Http\Controllers\Perawat\DashboardPerawatController;
use App\Http\Controllers\Resepsionis\DashboardResepsionisController;
use App\Http\Controllers\Pemilik\DashboardPemilikController;
use App\Http\Controllers\SiteController;

// ───────────────────────────────
// 🏠 Halaman utama
// ───────────────────────────────
Route::get('/', [SiteController::class, 'home'])->name('site.home');
Route::get('/home', [SiteController::class, 'home'])->name('home');
Route::get('/layanan', [SiteController::class, 'layanan'])->name('layanan');
Route::get('/kontak', [SiteController::class, 'kontak'])->name('kontak');
Route::get('/struktur', [SiteController::class, 'struktur'])->name('struktur');

// ───────────────────────────────
// 🔐 Autentikasi
// ───────────────────────────────
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ───────────────────────────────
// 👑 ADMIN (Role Administrator)
// ───────────────────────────────
Route::middleware(['auth', 'isAdministrator'])->group(function () {
    Route::get('/admin/dashboard', [DashboardAdminController::class, 'index'])->name('admin.dashboard');

    // Data master (read only)
    Route::get('/admin/user', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('user');
    Route::get('/admin/role', [App\Http\Controllers\Admin\RoleController::class, 'index'])->name('role');
    Route::get('/admin/role-user', [App\Http\Controllers\Admin\RoleUserController::class, 'index'])->name('role-user');
    Route::get('/admin/jenis-hewan', [App\Http\Controllers\Admin\JenisHewanController::class, 'index'])->name('jenis-hewan');
    Route::get('/admin/ras-hewan', [App\Http\Controllers\Admin\RasHewanController::class, 'index'])->name('ras-hewan');
    Route::get('/admin/pemilik', [App\Http\Controllers\Admin\PemilikController::class, 'index'])->name('pemilik');
    Route::get('/admin/pet', [App\Http\Controllers\Admin\PetController::class, 'index'])->name('pet');
    Route::get('/admin/kategori', [App\Http\Controllers\Admin\KategoriController::class, 'index'])->name('kategori');
    Route::get('/admin/kategori-klinis', [App\Http\Controllers\Admin\KategoriKlinisController::class, 'index'])->name('kategori-klinis');
    Route::get('/admin/kode-tindakan', [App\Http\Controllers\Admin\KodeTindakanTerapiController::class, 'index'])->name('kode-tindakan');
});

// ───────────────────────────────
// 🩺 DOKTER
// ───────────────────────────────
Route::middleware(['auth', 'isDokter'])->group(function () {
    Route::get('/dokter/dashboard', [DashboardDokterController::class, 'index'])->name('dokter.dashboard');
});

// ───────────────────────────────
// 💉 PERAWAT
// ───────────────────────────────
Route::middleware(['auth', 'isPerawat'])->group(function () {
    Route::get('/perawat/dashboard', [DashboardPerawatController::class, 'index'])->name('perawat.dashboard');
});

// ───────────────────────────────
// 🧾 RESEPSIONIS
// ───────────────────────────────
Route::middleware(['auth', 'isResepsionis'])->group(function () {
    Route::get('/resepsionis/dashboard', [DashboardResepsionisController::class, 'index'])->name('resepsionis.dashboard');
    Route::get('/resepsionis/pendaftaran', [App\Http\Controllers\Resepsionis\PendaftaranController::class, 'index'])->name('resepsionis.pendaftaran');
});

// ───────────────────────────────
// 🐾 PEMILIK
// ───────────────────────────────
Route::middleware(['auth', 'isPemilik'])->group(function () {
    Route::get('/pemilik/dashboard', [DashboardPemilikController::class, 'index'])->name('pemilik.dashboard');
    Route::get('/pemilik/pet', [App\Http\Controllers\Pemilik\PetController::class, 'index'])->name('pemilik.pet');
});
