<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Resepsionis\DashboardResepsionisController;
use App\Http\Controllers\JenisHewanController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RasHewanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KategoriKlinisController;
use App\Http\Controllers\KodeTindakanTerapiController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoleUserController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', [SiteController::class, 'home'])->name('site.home');
Route::get('/cek-koneksi', [SiteController::class, 'cekKoneksi'])->name('site.cek-koneksi');

Auth::routes();

// 🔹 Setelah login (halaman utama)
Route::get('/home', [HomeController::class, 'index'])->name('home');
// 🔹 Halaman utama
Route::get('/', [SiteController::class, 'home'])->name('home');

// 🔹 Halaman statis
Route::get('/layanan', [SiteController::class, 'layanan'])->name('layanan');
Route::get('/kontak', [SiteController::class, 'kontak'])->name('kontak');
Route::get('/struktur', [SiteController::class, 'struktur'])->name('struktur');
Route::get('/admin/dashboard', [DashboardAdminController::class, 'index'])->name('admin.dashboard');
Route::get('/resepsionis/dashboard', [DashboardResepsionisController::class, 'index'])->name('resepsionis.dashboard');


// 🔹 View data (modul 9)
Route::get('/jenis-hewan', [JenisHewanController::class, 'index'])->name('jenis-hewan');
Route::get('/pemilik', [PemilikController::class, 'index'])->name('pemilik');
Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/ras-hewan', [RasHewanController::class, 'index'])->name('ras-hewan');
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
Route::get('/kategori-klinis', [KategoriKlinisController::class, 'index'])->name('kategori-klinis');
Route::get('/kode-tindakan', [KodeTindakanTerapiController::class, 'index'])->name('kode-tindakan');
Route::get('/pet', [PetController::class, 'index'])->name('pet');
Route::get('/role', [RoleController::class, 'index'])->name('role');
Route::get('/role-user', [RoleUserController::class, 'index'])->name('role-user');

// 🔹 LOGIN MANUAL
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// 🔹 Home setelah login
Route::get('/home', function () {
    return view('home');
})->name('dashboard');