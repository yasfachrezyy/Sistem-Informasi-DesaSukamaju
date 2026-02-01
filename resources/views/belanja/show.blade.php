@extends('layouts.app')

@section('title', $produk->nama_produk . ' - Belanja UMKM')

@section('content')

<style>
    /* Styling deskripsi agar rapi */
    .product-description {
        font-size: 1rem;
        line-height: 1.7;
        color: #555;
    }
    .product-description img {
        max-width: 100% !important;
        height: auto !important;
        border-radius: 8px;
    }
</style>

<div class="container py-5">
    
    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb bg-light p-3 rounded-3 shadow-sm">
            <li class="breadcrumb-item"><a href="/" class="text-decoration-none text-primary fw-bold">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('belanja.umkm') }}" class="text-decoration-none text-primary fw-bold">Belanja</a></li>
            <li class="breadcrumb-item active text-muted" aria-current="page">{{ Str::limit($produk->nama_produk, 30) }}</li>
        </ol>
    </nav>

    <div class="row g-5">
        {{-- Kolom Kiri: Gambar Produk --}}
        <div class="col-lg-5">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden sticky-top" style="top: 100px; z-index: 1;">
                <img src="{{ $produk->gambar_produk ? asset('storage/' . $produk->gambar_produk) : asset('images/no-image.jpg') }}" 
                     class="w-100 object-fit-cover" 
                     alt="{{ $produk->nama_produk }}" 
                     style="height: 400px;"
                     onerror="this.onerror=null;this.src='https://placehold.co/600x600/e9ecef/6c757d?text=Gambar+Produk';">
            </div>
        </div>

        {{-- Kolom Kanan: Informasi Produk --}}
        <div class="col-lg-7">
            <div class="ps-lg-4">
                {{-- Judul --}}
                <h1 class="fw-bold text-dark mb-2">{{ $produk->nama_produk }}</h1>
                
                {{-- Harga --}}
                <h2 class="text-primary fw-bold mb-4">Rp {{ number_format($produk->harga, 0, ',', '.') }}</h2>

                {{-- Informasi Penjual (Card Kecil) --}}
                @if($produk->umkm)
                <div class="card bg-light border-0 rounded-4 mb-4 p-3">
                    <div class="d-flex align-items-center">
                        <div class="bg-white text-primary rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 50px; height: 50px;">
                            <i class="bi bi-shop fs-4"></i>
                        </div>
                        <div class="ms-3">
                            <span class="text-muted small text-uppercase fw-bold ls-1">Dijual Oleh:</span>
                            <h5 class="mb-0 fw-bold text-dark">
                                {{ $produk->umkm->nama_umkm }} 
                                <i class="bi bi-check-circle-fill text-success fs-6" title="Terverifikasi Desa"></i>
                            </h5>
                        </div>
                    </div>
                </div>
                @endif

                <hr class="my-4 opacity-10">

                {{-- Deskripsi --}}
                <h5 class="fw-bold mb-3"><i class="bi bi-card-text me-2"></i>Deskripsi Produk</h5>
                <div class="product-description text-break mb-5">
                    {!! $produk->deskripsi !!}
                </div>

                {{-- Tombol Aksi --}}
                <div class="d-grid gap-2 d-md-flex align-items-center">
                    
                    {{-- LOGIKA WHATSAPP (PERBAIKAN NAMA KOLOM) --}}
                    @if($produk->umkm && $produk->umkm->nomor_whatsapp)
                        @php
                            // 1. Ambil nomor dari kolom 'nomor_whatsapp'
                            $no_wa = $produk->umkm->nomor_whatsapp;
                            
                            // 2. Bersihkan karakter selain angka
                            $no_wa = preg_replace('/[^0-9]/', '', $no_wa);
                            
                            // 3. Ubah awalan '08' menjadi '628'
                            if(substr($no_wa, 0, 2) == '08') {
                                $no_wa = '62' . substr($no_wa, 1);
                            }
                            
                            // 4. Buat pesan otomatis
                            $pesan = "Halo {$produk->umkm->nama_umkm}, saya tertarik dengan produk *{$produk->nama_produk}* yang ada di Website Desa. Apakah stok masih tersedia?";
                            
                            // 5. Link API
                            $link_wa = "https://wa.me/{$no_wa}?text=" . urlencode($pesan);
                        @endphp

                        {{-- TOMBOL AKTIF --}}
                        <a href="{{ $link_wa }}" target="_blank" class="btn btn-success btn-lg rounded-pill fw-bold px-4 shadow-sm">
                            <i class="bi bi-whatsapp me-2"></i> Hubungi Sekarang
                        </a>
                    @else
                        {{-- TOMBOL MATI (JIKA KOLOM KOSONG) --}}
                        <button class="btn btn-secondary btn-lg rounded-pill px-4 disabled" disabled>
                            <i class="bi bi-telephone-x me-2"></i> Kontak Tidak Tersedia
                        </button>
                    @endif

                    <a href="{{ route('belanja.umkm') }}" class="btn btn-outline-secondary btn-lg rounded-pill px-4">
                        Kembali
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection