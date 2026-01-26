@extends('layouts.app')

@section('title', $produk->nama_produk . ' - Belanja UMKM')

@section('content')
<style>
    /* CSS dari kode yang Anda berikan */
    .detail-container-wrapper {
        font-family: sans-serif; 
        background-color: #f4f4f9; 
        color: #333; 
        padding: 40px 20px;
    }
    .detail-container { 
        max-width: 900px; 
        margin: auto; 
        background-color: #fff; 
        padding: 30px; 
        border-radius: 10px; 
        box-shadow: 0 4px 8px rgba(0,0,0,0.1); 
    }
    .product-image { 
        width: 100%; 
        max-height: 400px; 
        object-fit: cover; 
        border-radius: 10px; 
        margin-bottom: 20px; 
    }
    .product-title { 
        font-size: 2.5em; 
        margin-top: 0; 
        color: #4a4a4a; 
    }
    .product-price { 
        font-size: 2em; 
        font-weight: bold; 
        color: #2c5282; 
        margin-bottom: 10px; 
    }
    .product-owner { 
        font-size: 1.1em; 
        color: #777; 
        margin-bottom: 20px; 
        border-bottom: 1px solid #eee; 
        padding-bottom: 20px; 
    }
    .product-description { 
        line-height: 1.7; 
        margin-bottom: 30px; 
    }
    .whatsapp-button { 
        display: inline-block; 
        background-color: #25D366; 
        color: #fff; 
        text-align: center; 
        padding: 15px 30px; 
        border-radius: 8px; 
        text-decoration: none; 
        font-weight: bold; 
        font-size: 1.1em; 
        transition: background-color 0.3s; 
    }
    .whatsapp-button:hover { 
        background-color: #1DAE54; 
    }
    .back-link { 
        display: inline-block; 
        margin-bottom: 20px; 
        color: #2c5282; 
        text-decoration: none; 
    }
    .back-link:hover { 
        text-decoration: underline; 
    }
</style>

<main class="detail-container-wrapper">
    <div class="detail-container">
        <a href="{{ route('belanja.umkm') }}" class="back-link">&larr; Kembali ke Semua Produk</a>

        <h1 class="product-title">{{ $produk->nama_produk }}</h1>
        <p class="product-owner">Oleh: <strong>{{ $produk->umkm->nama_umkm }}</strong></p>

        <img class="product-image" src="{{ asset('storage/' . $produk->gambar_produk) }}" alt="{{ $produk->nama_produk }}">

        <p class="product-price">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>

        <div class="product-description">
            <strong>Deskripsi Produk:</strong>
            {!! $produk->deskripsi !!}
        </div>

        <a href="{{ $produk->umkm->link_whats_app }}" target="_blank" class="whatsapp-button">
            Hubungi Penjual via WhatsApp
        </a>
    </div>
</main>
@endsection

