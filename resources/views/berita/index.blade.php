@extends('layouts.app')

@section('title', 'Berita Desa')

@section('content')
<style>
    /* Gaya untuk halaman daftar berita */
    .news-list-wrapper {
        font-family: sans-serif; 
        background-color: #f4f4f9; 
        color: #333; 
        padding: 40px 20px;
    }
    .news-list-container { 
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
    .news-grid { 
        display: grid; 
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); 
        gap: 30px; 
    }
    .news-card { 
        background-color: #fff; 
        border-radius: 10px; 
        box-shadow: 0 4px 8px rgba(0,0,0,0.1); 
        overflow: hidden; 
        display: flex; 
        flex-direction: column; 
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0,0,0,0.15);
    }
    .news-card img { 
        width: 100%; 
        height: 200px; 
        object-fit: cover; 
    }
    .news-content { 
        padding: 20px; 
        flex-grow: 1; 
        display: flex; 
        flex-direction: column; 
    }
    .news-content h3 { 
        margin-top: 0; 
        font-size: 1.3em; 
        color: #333;
        line-height: 1.4;
    }
    .news-date { 
        font-size: 0.9em; 
        color: #777; 
        margin-bottom: 15px; 
    }
    .news-excerpt { 
        font-size: 0.95em; 
        line-height: 1.6; 
        margin-bottom: 20px; 
        flex-grow: 1; 
    }
    .read-more-button { 
        display: block; 
        background-color: #2c5282; 
        color: #fff; 
        text-align: center; 
        padding: 12px; 
        border-radius: 8px; 
        text-decoration: none; 
        font-weight: bold; 
        margin-top: auto; 
        transition: background-color 0.3s; 
    }
    .read-more-button:hover { 
        background-color: #1a365d; 
    }
    .pagination {
        margin-top: 40px;
        display: flex;
        justify-content: center;
    }
</style>

<main class="news-list-wrapper">
    <div class="news-list-container">
        <div class="header">
            <h1>Berita & Informasi Desa</h1>
            <p>Ikuti perkembangan dan kegiatan terbaru dari Desa Sukamaju.</p>
        </div>

        <div class="news-grid">
            @forelse ($beritas as $item)
                <div class="news-card">
                    <a href="{{ route('berita.show', $item->slug) }}">
                        <img src="{{ $item->gambar ? asset('storage/' . $item->gambar) : 'https://placehold.co/400x300/4a4a4a/white?text=Berita' }}" alt="{{ $item->judul }}">
                    </a>
                    <div class="news-content">
                        <p class="news-date"><i class="bi bi-calendar-event"></i> Dipublikasikan pada: {{ $item->created_at->format('d F Y') }}</p>
                        <a href="{{ route('berita.show', $item->slug) }}" style="text-decoration: none; color: inherit;">
                            <h3>{{ $item->judul }}</h3>
                        </a>
                        <div class="news-excerpt">
                            {!! Str::limit(strip_tags($item->isi), 150) !!}
                        </div>
                        <a href="{{ route('berita.show', $item->slug) }}" class="read-more-button">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            @empty
                <p style="grid-column: 1 / -1; text-align: center;">Belum ada berita yang dipublikasikan.</p>
            @endforelse
        </div>

        <div class="pagination">
            {{ $beritas->links() }}
        </div>
    </div>
</main>
@endsection
