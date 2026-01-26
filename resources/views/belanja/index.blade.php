@extends('layouts.app')

@section('title', 'Belanja UMKM Desa')

@section('content')
<style>
    /* Mengadopsi gaya visual yang konsisten */
    .product-list-wrapper {
        font-family: sans-serif; 
        background-color: #f4f4f9; 
        color: #333; 
        padding: 40px 20px;
    }
    .product-list-container { 
        max-width: 1200px; 
        margin: auto; 
    }
    .header { 
        text-align: center; 
        margin-bottom: 40px; 
    }
    .header h1 { 
        font-size: 2.5em; 
        color: #4a4a4a; 
    }
    .product-grid { 
        display: grid; 
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); 
        gap: 30px; 
    }
    .product-card { 
        background-color: #fff; 
        border-radius: 10px; 
        box-shadow: 0 4px 8px rgba(0,0,0,0.1); 
        overflow: hidden; 
        display: flex; 
        flex-direction: column; 
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0,0,0,0.15);
    }
    .product-card img { 
        width: 100%; 
        height: 200px; 
        object-fit: cover; 
    }
    .product-content { 
        padding: 20px; 
        flex-grow: 1; 
        display: flex; 
        flex-direction: column; 
    }
    .product-content h3 { 
        margin-top: 0; 
        font-size: 1.2em; 
        color: #333;
    }
    .product-price { 
        font-size: 1.3em; 
        font-weight: bold; 
        color: #2c5282; 
        margin-bottom: 10px; 
    }
    .product-owner { 
        font-size: 0.9em; 
        color: #777; 
        margin-bottom: 15px; 
    }
    .product-description { 
        font-size: 0.95em; 
        line-height: 1.5; 
        margin-bottom: 20px; 
        flex-grow: 1; 
    }
    .whatsapp-button { 
        display: block; 
        background-color: #25D366; 
        color: #fff; 
        text-align: center; 
        padding: 12px; 
        border-radius: 8px; 
        text-decoration: none; 
        font-weight: bold; 
        margin-top: auto; 
        transition: background-color 0.3s; 
    }
    .whatsapp-button:hover { 
        background-color: #1DAE54; 
    }
</style>

<main class="product-list-wrapper">
    <div class="product-list-container">
        <div class="header">
            <h1>Belanja Dari Desa</h1>
            <p>Temukan produk-produk unggulan dari UMKM Desa Sukamaju</p>
        </div>

        <div class="product-grid">
            @forelse ($produks as $produk)
                <div class="product-card">
                    <a href="{{ route('produk.show', $produk) }}">
                        <img src="{{ $produk->gambar_produk ? asset('storage/' . $produk->gambar_produk) : 'https://placehold.co/400x300/28a745/white?text=' . urlencode($produk->nama_produk) }}" alt="{{ $produk->nama_produk }}">
                    </a>

                    <div class="product-content">
                        <a href="{{ route('produk.show', $produk) }}" style="text-decoration: none; color: inherit;">
                            <h3>{{ $produk->nama_produk }}</h3>
                        </a>
                        <p class="product-price">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                        
                        @if($produk->umkm)
                        <p class="product-owner">Oleh: <strong>{{ $produk->umkm->nama_umkm }}</strong></p>
                        @endif

                        <div class="product-description">
                            {!! Str::limit(strip_tags($produk->deskripsi), 100) !!}
                        </div>

                        @if($produk->umkm && $produk->umkm->link_whats_app)
                        <a href="{{ $produk->umkm->link_whats_app }}" target="_blank" class="whatsapp-button">
                            <i class="bi bi-whatsapp"></i> Pesan via WhatsApp
                        </a>
                        @endif
                    </div>
                </div>
            @empty
                <p style="grid-column: 1 / -1; text-align: center;">Belum ada produk yang tersedia saat ini.</p>
            @endforelse
        </div>
    </div>
</main>
@endsection

