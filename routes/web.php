<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;

Route::get('/', function () {
    return view('welcome');
});

// Halaman daftar semua berita
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');

// Halaman detail satu berita
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');
