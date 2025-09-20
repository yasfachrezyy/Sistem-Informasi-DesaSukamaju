<!DOCTYPE html>
<html>
<head>
    <title>Berita Desa</title>
    </head>
<body>
    <h1>Daftar Berita Desa</h1>
    <hr>
    @foreach ($beritas as $item)
        <article>
            <h2><a href="{{ route('berita.show', $item->slug) }}">{{ $item->judul }}</a></h2>
            <p>Dipublikasikan pada: {{ $item->created_at->format('d F Y') }}</p>
            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" width="300">
            <div>
                {!! Str::limit($item->isi, 150) !!} </div>
        </article>
        <hr>
    @endforeach

    {{ $beritas->links() }} </body>
</html>
