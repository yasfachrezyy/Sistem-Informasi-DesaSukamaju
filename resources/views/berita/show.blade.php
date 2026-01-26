@extends('layouts.app')

@section('title', $berita->judul)

@section('content')
<style>
    /* Gaya untuk halaman detail berita */
    .article-wrapper {
        font-family: sans-serif; 
        background-color: #f4f4f9; 
        color: #333; 
        padding: 40px 20px;
    }
    .article-container { 
        max-width: 800px; 
        margin: auto; 
        background-color: #fff; 
        padding: 40px; 
        border-radius: 10px; 
        box-shadow: 0 4px 12px rgba(0,0,0,0.1); 
    }
    .article-image { 
        width: 100%; 
        max-height: 450px; 
        object-fit: cover; 
        border-radius: 10px; 
        margin-bottom: 25px; 
    }
    .article-title { 
        font-size: 2.8em; 
        margin-top: 0; 
        color: #4a4a4a;
        line-height: 1.2; 
    }
    .article-meta { 
        font-size: 1em; 
        color: #777; 
        margin-bottom: 25px; 
        border-bottom: 1px solid #eee; 
        padding-bottom: 20px; 
    }
    .article-content { 
        line-height: 1.8; 
        font-size: 1.1em;
    }
    .article-content img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin: 15px 0;
    }
    .back-link { 
        display: inline-block; 
        margin-bottom: 25px; 
        color: #2c5282; 
        text-decoration: none;
        font-weight: 500;
    }
    .back-link:hover { 
        text-decoration: underline; 
    }
</style>

<main class="article-wrapper">
    <div class="article-container">
        <a href="{{ route('berita.index') }}" class="back-link">&larr; Kembali ke Daftar Berita</a>

        <h1 class="article-title">{{ $berita->judul }}</h1>
        <p class="article-meta">
            <i class="bi bi-calendar-event"></i> Dipublikasikan pada: {{ $berita->created_at->format('d F Y') }}
        </p>

        @if($berita->gambar)
        <img class="article-image" src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}">
        @endif

        <div class="article-content">
            {!! $berita->isi !!}
        </div>
    </div>
</main>
@endsection
