<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belanja UMKM Desa Sukamaju</title>
    <style>
        /* Simple CSS untuk tampilan yang lebih baik */
        body { font-family: sans-serif; background-color: #f4f4f9; color: #333; margin: 0; padding: 20px; }
        .container { max-width: 1200px; margin: auto; }
        .header { text-align: center; margin-bottom: 40px; }
        .header h1 { font-size: 2.5em; color: #4a4a4a; }
        .product-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 30px; }
        .product-card { background-color: #fff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); overflow: hidden; display: flex; flex-direction: column; }
        .product-card img { width: 100%; height: 200px; object-fit: cover; }
        .product-content { padding: 20px; flex-grow: 1; display: flex; flex-direction: column; }
        .product-content h3 { margin-top: 0; font-size: 1.2em; }
        .product-price { font-size: 1.3em; font-weight: bold; color: #2c5282; margin-bottom: 10px; }
        .product-owner { font-size: 0.9em; color: #777; margin-bottom: 15px; }
        .product-description { font-size: 0.95em; line-height: 1.5; margin-bottom: 20px; flex-grow: 1; }
        .whatsapp-button { display: block; background-color: #25D366; color: #fff; text-align: center; padding: 12px; border-radius: 5px; text-decoration: none; font-weight: bold; margin-top: auto; transition: background-color 0.3s; }
        .whatsapp-button:hover { background-color: #1DAE54; }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <h1>Belanja Dari Desa</h1>
            <p>Temukan produk-produk unggulan dari UMKM Desa Sukamaju</p>
        </div>

        <div class="product-grid">
            @forelse ($produks as $produk)
                <div class="product-card">
                    <img src="{{ asset('storage/' . $produk->gambar_produk) }}" alt="{{ $produk->nama_produk }}">

                    <div class="product-content">
                        <a href="{{ route('produk.show', $produk) }}" style="text-decoration: none; color: inherit;">
                            <h3>{{ $produk->nama_produk }}</h3>
                        </a>
                        <p class="product-price">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                        <p class="product-owner">Oleh: <strong>{{ $produk->umkm->nama_umkm }}</strong></p>

                        <div class="product-description">
                            {!! Str::limit($produk->deskripsi, 100) !!}
                        </div>

                        <a href="{{ $produk->umkm->link_whats_app }}" target="_blank" class="whatsapp-button">
                            Pesan via WhatsApp
                        </a>
                    </div>
                </div>
            @empty
                <p>Belum ada produk yang tersedia saat ini.</p>
            @endforelse
        </div>
    </div>

</body>
</html>
