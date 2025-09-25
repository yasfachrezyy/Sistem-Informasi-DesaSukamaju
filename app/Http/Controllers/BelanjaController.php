<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class BelanjaController extends Controller
{
    /**
     * Menampilkan halaman Belanja UMKM.
     */
    public function umkm()
    {
        $produks = Produk::with('umkm')->latest()->get();
        return view('belanja.index', compact('produks'));
    }

    /**
     * TAMBAHKAN METHOD BARU DI BAWAH INI
     * Menampilkan halaman detail untuk satu produk.
     */
    public function showProduk(Produk $produk) // Laravel otomatis mencari produk berdasarkan slug dari URL
    {
        // Langsung kirim data produk yang sudah ditemukan ke view
        return view('belanja.show', compact('produk'));
    }
}
