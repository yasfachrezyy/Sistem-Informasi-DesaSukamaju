<!DOCTYPE html>
<html>
<head>
    <title>{{ $berita->judul }}</title>
</head>
<body>
    <a href="{{ route('berita.index') }}">Kembali ke Daftar Berita</a>
    <hr>
    <h1>{{ $berita->judul }}</h1>
    <p>Dipublikasikan pada: {{ $berita->created_at->format('d F Y') }}</p>
    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" style="max-width: 100%;">
    <div>
        {!! $berita->isi !!} </div>
</body>
</html>
