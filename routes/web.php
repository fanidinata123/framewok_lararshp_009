<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

//  Route untuk cek koneksi database
Route::get('/cek-koneksi', [SiteController::class, 'cekKoneksi'])->name('site.cek-koneksi');

// Halaman utama
Route::get('/', [SiteController::class, 'home'])->name('home');

// Halaman lain
Route::get('/layanan', [SiteController::class, 'layanan'])->name('layanan');
Route::get('/kontak', [SiteController::class, 'kontak'])->name('kontak');
Route::get('/struktur', [SiteController::class, 'struktur'])->name('struktur');
Route::get('/login', [SiteController::class, 'login'])->name('login');

use App\Http\Controllers\JenisHewanController;
Route::get('/jenis-hewan', [JenisHewanController::class, 'index'])->name('site.jenis-hewan');

use App\Http\Controllers\PemilikController;
Route::get('/pemilik', [PemilikController::class, 'index'])->name('site.pemilik');

use App\Http\Controllers\UserController;
Route::get('/user', [UserController::class, 'index'])->name('site.user');

use App\Http\Controllers\RasHewanController;
Route::get('/ras-hewan', [RasHewanController::class, 'index'])->name('ras-hewan');

use App\Http\Controllers\KategoriController;
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');

use App\Http\Controllers\KategoriKlinisController;
Route::get('/kategori-klinis', [KategoriKlinisController::class, 'index'])->name('kategori-klinis');

use App\Http\Controllers\KodeTindakanTerapiController;
Route::get('/kode-tindakan', [KodeTindakanTerapiController::class, 'index'])->name('kode-tindakan');

use App\Http\Controllers\PetController;
Route::get('/pet', [PetController::class, 'index'])->name('pet');

use App\Http\Controllers\RoleController;
Route::get('/role', [RoleController::class, 'index'])->name('role');

use App\Http\Controllers\RoleUserController;
Route::get('/role-user', [RoleUserController::class, 'index'])->name('role-user');









