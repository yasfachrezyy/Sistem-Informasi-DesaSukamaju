<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BelanjaController;
use App\Http\Controllers\InfografisController;

Route::get('/', function () {
    return view('welcome');
});

// Halaman daftar semua berita
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');

// Halaman detail satu berita
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');

// Halaman Belanja
Route::get('/belanja-umkm', [BelanjaController::class, 'umkm'])->name('belanja.umkm');

// Halaman detail produk
Route::get('/produk/{produk:slug}', [BelanjaController::class, 'showProduk'])->name('produk.show');

// Route untuk Infografis Desa (menunjuk ke controller baru)
Route::prefix('infografis')->name('infografis.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('infografis.penduduk');
    })->name('index');
    Route::get('/penduduk', [InfografisController::class, 'penduduk'])->name('penduduk');
    Route::get('/apbdes', [InfografisController::class, 'apbdes'])->name('apbdes');
    Route::get('/stunting', [InfografisController::class, 'stunting'])->name('stunting');
    Route::get('/bansos', [InfografisController::class, 'bansos'])->name('bansos');
    Route::get('/idm', [InfografisController::class, 'idm'])->name('idm');
    Route::get('/sdgs', [InfografisController::class, 'sdgs'])->name('sdgs');
});
