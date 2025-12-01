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

    // Data master
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

    // Data transaksi
    Route::get('/temu-dokter', [App\Http\Controllers\Admin\TemuDokterController::class, 'index'])->name('temu-dokter.index');
    Route::get('/temu-dokter/create', [App\Http\Controllers\Admin\TemuDokterController::class, 'create'])->name('temu-dokter.create');
    Route::post('/temu-dokter/store', [App\Http\Controllers\Admin\TemuDokterController::class, 'store'])->name('temu-dokter.store');
    Route::get('/temu-dokter/edit', [App\Http\Controllers\Admin\TemuDokterController::class, 'edit'])->name('temu-dokter.edit');
    Route::post('/temu-dokter/update', [App\Http\Controllers\Admin\TemuDokterController::class, 'update'])->name('temu-dokter.update');
    Route::post('/temu-dokter/destroy', [App\Http\Controllers\Admin\TemuDokterController::class, 'destroy'])->name('temu-dokter.destroy');

    Route::get('/rekam-medis', [App\Http\Controllers\Admin\RekamMedisController::class, 'index'])->name('rekam-medis.index');
    Route::get('/rekam-medis/create', [App\Http\Controllers\Admin\RekamMedisController::class, 'create'])->name('rekam-medis.create');
    Route::post('/rekam-medis/store', [App\Http\Controllers\Admin\RekamMedisController::class, 'store'])->name('rekam-medis.store');
    Route::get('/rekam-medis/edit', [App\Http\Controllers\Admin\RekamMedisController::class, 'edit'])->name('rekam-medis.edit');
    Route::post('/rekam-medis/update', [App\Http\Controllers\Admin\RekamMedisController::class, 'update'])->name('rekam-medis.update');
    Route::post('/rekam-medis/destroy', [App\Http\Controllers\Admin\RekamMedisController::class, 'destroy'])->name('rekam-medis.destroy');

    Route::get('/detail-rekam-medis', [App\Http\Controllers\Admin\DetailRekamMedisController::class, 'index'])->name('detail-rekam-medis.index');
    Route::get('/detail-rekam-medis/create', [App\Http\Controllers\Admin\DetailRekamMedisController::class, 'create'])->name('detail-rekam-medis.create');
    Route::post('/detail-rekam-medis/store', [App\Http\Controllers\Admin\DetailRekamMedisController::class, 'store'])->name('detail-rekam-medis.store');
    Route::get('/detail-rekam-medis/edit', [App\Http\Controllers\Admin\DetailRekamMedisController::class, 'edit'])->name('detail-rekam-medis.edit');
    Route::post('/detail-rekam-medis/update', [App\Http\Controllers\Admin\DetailRekamMedisController::class, 'update'])->name('detail-rekam-medis.update');
    Route::post('/detail-rekam-medis/destroy', [App\Http\Controllers\Admin\DetailRekamMedisController::class, 'destroy'])->name('detail-rekam-medis.destroy');
});

// ───────────────────────────────
// 🩺 DOKTER
// ───────────────────────────────
Route::middleware(['auth', 'isDokter'])
    ->prefix('dokter')
    ->name('dokter.')
    ->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [DashboardDokterController::class, 'index'])->name('dashboard');
    
    // Data Pasien (View Only)
    Route::get('/pasien', [App\Http\Controllers\Dokter\PasienController::class, 'index'])->name('pasien.index');
    Route::get('/pasien/show', [App\Http\Controllers\Dokter\PasienController::class, 'show'])->name('pasien.show');
    
    // Jadwal Temu Dokter (View Only)
    Route::get('/temu-dokter', [App\Http\Controllers\Dokter\TemuDokterController::class, 'index'])->name('temu-dokter.index');
    
    // Rekam Medis (View Only)
    Route::get('/rekam-medis', [App\Http\Controllers\Dokter\RekamMedisController::class, 'index'])->name('rekam-medis.index');
    
    // Detail Rekam Medis (CRUD)
    Route::get('/detail-rekam-medis', [App\Http\Controllers\Dokter\DetailRekamMedisController::class, 'index'])->name('detail-rekam-medis.index');
    Route::get('/detail-rekam-medis/create', [App\Http\Controllers\Dokter\DetailRekamMedisController::class, 'create'])->name('detail-rekam-medis.create');
    Route::post('/detail-rekam-medis/store', [App\Http\Controllers\Dokter\DetailRekamMedisController::class, 'store'])->name('detail-rekam-medis.store');
    Route::get('/detail-rekam-medis/edit', [App\Http\Controllers\Dokter\DetailRekamMedisController::class, 'edit'])->name('detail-rekam-medis.edit');
    Route::post('/detail-rekam-medis/update', [App\Http\Controllers\Dokter\DetailRekamMedisController::class, 'update'])->name('detail-rekam-medis.update');
    Route::post('/detail-rekam-medis/destroy', [App\Http\Controllers\Dokter\DetailRekamMedisController::class, 'destroy'])->name('detail-rekam-medis.destroy');
    
    // Profil
    Route::get('/profil', [App\Http\Controllers\Dokter\ProfilController::class, 'index'])->name('profil');
    Route::post('/profil/update', [App\Http\Controllers\Dokter\ProfilController::class, 'update'])->name('profil.update');
});

// ───────────────────────────────
// 💉 PERAWAT
// ───────────────────────────────
Route::middleware(['auth', 'isPerawat'])
    ->prefix('perawat')
    ->name('perawat.')
    ->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [DashboardPerawatController::class, 'index'])->name('dashboard');
    
    // Data Pasien (View Only)
    Route::get('/pasien', [App\Http\Controllers\Perawat\PasienController::class, 'index'])->name('pasien.index');
    Route::get('/pasien/show', [App\Http\Controllers\Perawat\PasienController::class, 'show'])->name('pasien.show');
    
    // Rekam Medis (CRUD)
    Route::get('/rekam-medis', [App\Http\Controllers\Perawat\RekamMedisController::class, 'index'])->name('rekam-medis.index');
    Route::get('/rekam-medis/create', [App\Http\Controllers\Perawat\RekamMedisController::class, 'create'])->name('rekam-medis.create');
    Route::post('/rekam-medis/store', [App\Http\Controllers\Perawat\RekamMedisController::class, 'store'])->name('rekam-medis.store');
    Route::get('/rekam-medis/edit', [App\Http\Controllers\Perawat\RekamMedisController::class, 'edit'])->name('rekam-medis.edit');
    Route::post('/rekam-medis/update', [App\Http\Controllers\Perawat\RekamMedisController::class, 'update'])->name('rekam-medis.update');
    Route::post('/rekam-medis/destroy', [App\Http\Controllers\Perawat\RekamMedisController::class, 'destroy'])->name('rekam-medis.destroy');
    
    // Detail Rekam Medis (View Only) - PERBAIKAN DI SINI
    Route::get('/detail-rekam-medis', [App\Http\Controllers\Perawat\DetailRekamMedisController::class, 'index'])->name('detail-rekam-medis.index');
    
    // Profil
    Route::get('/profil', [App\Http\Controllers\Perawat\ProfilController::class, 'index'])->name('profil');
    Route::post('/profil/update', [App\Http\Controllers\Perawat\ProfilController::class, 'update'])->name('profil.update');
});

// ───────────────────────────────
// 🧾 RESEPSIONIS
// ───────────────────────────────
Route::middleware(['auth', 'isResepsionis'])
    ->prefix('resepsionis')
    ->name('resepsionis.')
    ->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [DashboardResepsionisController::class, 'index'])->name('dashboard');
    
    // CRUD Pet
    Route::get('/pet', [App\Http\Controllers\Resepsionis\PetController::class, 'index'])->name('pet.index');
    Route::get('/pet/create', [App\Http\Controllers\Resepsionis\PetController::class, 'create'])->name('pet.create');
    Route::post('/pet/store', [App\Http\Controllers\Resepsionis\PetController::class, 'store'])->name('pet.store');
    Route::get('/pet/edit', [App\Http\Controllers\Resepsionis\PetController::class, 'edit'])->name('pet.edit');
    Route::post('/pet/update', [App\Http\Controllers\Resepsionis\PetController::class, 'update'])->name('pet.update');
    Route::post('/pet/destroy', [App\Http\Controllers\Resepsionis\PetController::class, 'destroy'])->name('pet.destroy');
    
    // CRUD Pemilik
    Route::get('/pemilik', [App\Http\Controllers\Resepsionis\PemilikController::class, 'index'])->name('pemilik.index');
    Route::get('/pemilik/create', [App\Http\Controllers\Resepsionis\PemilikController::class, 'create'])->name('pemilik.create');
    Route::post('/pemilik/store', [App\Http\Controllers\Resepsionis\PemilikController::class, 'store'])->name('pemilik.store');
    Route::get('/pemilik/edit', [App\Http\Controllers\Resepsionis\PemilikController::class, 'edit'])->name('pemilik.edit');
    Route::post('/pemilik/update', [App\Http\Controllers\Resepsionis\PemilikController::class, 'update'])->name('pemilik.update');
    Route::post('/pemilik/destroy', [App\Http\Controllers\Resepsionis\PemilikController::class, 'destroy'])->name('pemilik.destroy');
    
    // CRUD Temu Dokter
    Route::get('/temu-dokter', [App\Http\Controllers\Resepsionis\TemuDokterController::class, 'index'])->name('temu-dokter.index');
    Route::get('/temu-dokter/create', [App\Http\Controllers\Resepsionis\TemuDokterController::class, 'create'])->name('temu-dokter.create');
    Route::post('/temu-dokter/store', [App\Http\Controllers\Resepsionis\TemuDokterController::class, 'store'])->name('temu-dokter.store');
    Route::get('/temu-dokter/edit', [App\Http\Controllers\Resepsionis\TemuDokterController::class, 'edit'])->name('temu-dokter.edit');
    Route::post('/temu-dokter/update', [App\Http\Controllers\Resepsionis\TemuDokterController::class, 'update'])->name('temu-dokter.update');
    Route::post('/temu-dokter/destroy', [App\Http\Controllers\Resepsionis\TemuDokterController::class, 'destroy'])->name('temu-dokter.destroy');
});

// ───────────────────────────────
// 🐾 PEMILIK
// ───────────────────────────────
Route::middleware(['auth', 'isPemilik'])
    ->prefix('pemilik')
    ->name('pemilik.')
    ->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [App\Http\Controllers\Pemilik\DashboardPemilikController::class, 'index'])->name('dashboard');
    
    // View Jadwal Temu Dokter
    Route::get('/temu-dokter', [App\Http\Controllers\Pemilik\TemuDokterController::class, 'index'])->name('temu-dokter.index');
    
    // View Rekam Medis
    Route::get('/rekam-medis', [App\Http\Controllers\Pemilik\RekamMedisController::class, 'index'])->name('rekam-medis.index');
    
    // View Pet
    Route::get('/pet', [App\Http\Controllers\Pemilik\PetController::class, 'index'])->name('pet.index');
    
    // Profil
    Route::get('/profil', [App\Http\Controllers\Pemilik\ProfilController::class, 'index'])->name('profil.index');
    Route::post('/profil/update', [App\Http\Controllers\Pemilik\ProfilController::class, 'update'])->name('profil.update');
});