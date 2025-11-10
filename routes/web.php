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
Route::middleware(['auth', 'isAdministrator'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardAdminController::class, 'index'])->name('dashboard');

    // Data master (read only)
    Route::get('/user', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/update', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('user.update');
    Route::post('/user/destroy', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('user.destroy');


    Route::get('/role', [App\Http\Controllers\Admin\RoleController::class, 'index'])->name('role.index');
    Route::get('/role/create', [App\Http\Controllers\Admin\RoleController::class, 'create'])->name('role.create');
    Route::post('/role/store', [App\Http\Controllers\Admin\RoleController::class, 'store'])->name('role.store');
    Route::get('/role/edit', [App\Http\Controllers\Admin\RoleController::class, 'edit'])->name('role.edit');
    Route::post('/role/update', [App\Http\Controllers\Admin\RoleController::class, 'update'])->name('role.update');
    Route::post('/role/destroy', [App\Http\Controllers\Admin\RoleController::class, 'destroy'])->name('role.destroy');


    Route::get('/role-user', [App\Http\Controllers\Admin\RoleUserController::class, 'index'])->name('role-user.index');
    Route::get('/role-user/create', [App\Http\Controllers\Admin\RoleUserController::class, 'create'])->name('role-user.create');
    Route::post('/role-user/store', [App\Http\Controllers\Admin\RoleUserController::class, 'store'])->name('role-user.store');
    Route::get('/role-user/edit', [App\Http\Controllers\Admin\RoleUserController::class, 'edit'])->name('role-user.edit');
    Route::post('/role-user/update', [App\Http\Controllers\Admin\RoleUserController::class, 'update'])->name('role-user.update');
    Route::post('/role-user/destroy', [App\Http\Controllers\Admin\RoleUserController::class, 'destroy'])->name('role-user.destroy');

    
    Route::get('/jenis-hewan', [App\Http\Controllers\Admin\JenisHewanController::class, 'index'])->name('jenis-hewan.index');
    Route::get('/jenis-hewan/create', [App\Http\Controllers\Admin\JenisHewanController::class, 'create'])->name('jenis-hewan.create');
    Route::post('/jenis-hewan/store', [App\Http\Controllers\Admin\JenisHewanController::class, 'store'])->name('jenis-hewan.store');
    Route::get('/jenis-hewan/edit', [App\Http\Controllers\Admin\JenisHewanController::class, 'edit'])->name('jenis-hewan.edit');
    Route::post('/jenis-hewan/update', [App\Http\Controllers\Admin\JenisHewanController::class, 'update'])->name('jenis-hewan.update');
    Route::post('/jenis-hewan/destroy', [App\Http\Controllers\Admin\JenisHewanController::class, 'destroy'])->name('jenis-hewan.destroy');
    
    Route::get('/ras-hewan', [App\Http\Controllers\Admin\RasHewanController::class, 'index'])->name('ras-hewan.index');
    Route::get('/ras-hewan/create', [App\Http\Controllers\Admin\RasHewanController::class, 'create'])->name('ras-hewan.create');
    Route::post('/ras-hewan/store', [App\Http\Controllers\Admin\RasHewanController::class, 'store'])->name('ras-hewan.store');
    Route::get('/ras-hewan/edit', [App\Http\Controllers\Admin\RasHewanController::class, 'edit'])->name('ras-hewan.edit');
    Route::post('/ras-hewan/update', [App\Http\Controllers\Admin\RasHewanController::class, 'update'])->name('ras-hewan.update');
    Route::post('/ras-hewan/destroy', [App\Http\Controllers\Admin\RasHewanController::class, 'destroy'])->name('ras-hewan.destroy');

    Route::get('/pemilik', [App\Http\Controllers\Admin\PemilikController::class, 'index'])->name('pemilik.index');
    Route::get('/pemilik/create', [App\Http\Controllers\Admin\PemilikController::class, 'create'])->name('pemilik.create');
    Route::post('/pemilik/store', [App\Http\Controllers\Admin\PemilikController::class, 'store'])->name('pemilik.store');
    Route::get('/pemilik/edit', [App\Http\Controllers\Admin\PemilikController::class, 'edit'])->name('pemilik.edit');
    Route::post('/pemilik/update', [App\Http\Controllers\Admin\PemilikController::class, 'update'])->name('pemilik.update');
    Route::post('/pemilik/destroy', [App\Http\Controllers\Admin\PemilikController::class, 'destroy'])->name('pemilik.destroy');


    Route::get('/pet', [App\Http\Controllers\Admin\PetController::class, 'index'])->name('pet.index');
    Route::get('/pet/create', [App\Http\Controllers\Admin\PetController::class, 'create'])->name('pet.create');
    Route::post('/pet/store', [App\Http\Controllers\Admin\PetController::class, 'store'])->name('pet.store');
    Route::get('/pet/edit', [App\Http\Controllers\Admin\PetController::class, 'edit'])->name('pet.edit');
    Route::post('/pet/update', [App\Http\Controllers\Admin\PetController::class, 'update'])->name('pet.update');
    Route::post('/pet/destroy', [App\Http\Controllers\Admin\PetController::class, 'destroy'])->name('pet.destroy');


    Route::get('/kategori', [App\Http\Controllers\Admin\KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/kategori/create', [App\Http\Controllers\Admin\KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/kategori/store', [App\Http\Controllers\Admin\KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/edit', [App\Http\Controllers\Admin\KategoriController::class, 'edit'])->name('kategori.edit');
    Route::post('/kategori/update', [App\Http\Controllers\Admin\KategoriController::class, 'update'])->name('kategori.update');
    Route::post('/kategori/destroy', [App\Http\Controllers\Admin\KategoriController::class, 'destroy'])->name('kategori.destroy');


    Route::get('/kategori-klinis', [App\Http\Controllers\Admin\KategoriKlinisController::class, 'index'])->name('kategori-klinis.index');
    Route::get('/kategori-klinis/create', [App\Http\Controllers\Admin\KategoriKlinisController::class, 'create'])->name('kategori-klinis.create');
    Route::post('/kategori-klinis/store', [App\Http\Controllers\Admin\KategoriKlinisController::class, 'store'])->name('kategori-klinis.store');
    Route::get('/kategori-klinis/edit', [App\Http\Controllers\Admin\KategoriKlinisController::class, 'edit'])->name('kategori-klinis.edit');
    Route::post('/kategori-klinis/update', [App\Http\Controllers\Admin\KategoriKlinisController::class, 'update'])->name('kategori-klinis.update');
    Route::post('/kategori-klinis/destroy', [App\Http\Controllers\Admin\KategoriKlinisController::class, 'destroy'])->name('kategori-klinis.destroy');


    Route::get('/kode-tindakan', [App\Http\Controllers\Admin\KodeTindakanTerapiController::class, 'index'])->name('kode-tindakan.index');
    Route::get('/kode-tindakan/create', [App\Http\Controllers\Admin\KodeTindakanTerapiController::class, 'create'])->name('kode-tindakan.create');
    Route::post('/kode-tindakan/store', [App\Http\Controllers\Admin\KodeTindakanTerapiController::class, 'store'])->name('kode-tindakan.store');
    Route::get('/kode-tindakan/edit', [App\Http\Controllers\Admin\KodeTindakanTerapiController::class, 'edit'])->name('kode-tindakan.edit');
    Route::post('/kode-tindakan/update', [App\Http\Controllers\Admin\KodeTindakanTerapiController::class, 'update'])->name('kode-tindakan.update');
    Route::post('/kode-tindakan/destroy', [App\Http\Controllers\Admin\KodeTindakanTerapiController::class, 'destroy'])->name('kode-tindakan.destroy');
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
