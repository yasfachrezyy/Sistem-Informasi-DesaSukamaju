@extends('layouts.infografis')
@section('title', 'Bantuan Sosial')
@section('content')
    <h2 class="section-title">Bantuan Sosial (Bansos)</h2>
    <h4>Jumlah Penerima per Jenis Bantuan</h4>
    @if($bansos->isNotEmpty())
    <table>
        <thead><tr><th>Jenis Bantuan</th><th>Jumlah Penerima</th></tr></thead>
        <tbody>
        @foreach($bansos as $b)
            <tr><td>{{ $b->jenis_bansos }}</td><td>{{ number_format($b->jumlah_penerima) }} Orang</td></tr>
        @endforeach
        </tbody>
    </table>
    @else
    <p>Data ringkasan bansos belum diisi.</p>
    @endif
    <hr style="margin: 2rem 0;">
    <h4>Cek Penerima Bansos Individu</h4>
    <form action="{{ route('infografis.bansos') }}" method="GET" class="search-form">
        <input type="text" name="nik" placeholder="Masukkan NIK Anda (16 digit)..." value="{{ request('nik') }}" minlength="16" maxlength="16" required>
        <button type="submit">Cari</button>
    </form>
    @if(request()->filled('nik'))
        <div class="search-result">
        @if($hasilCariBansos)
            <p><strong>Data Ditemukan:</strong><br>
            Nama: {{ $hasilCariBansos->nama }}<br>
            NIK: {{ $hasilCariBansos->nik }}<br>
            Alamat: {{ $hasilCariBansos->alamat }}</p>
        @else
            <p>Data NIK "{{ request('nik') }}" tidak ditemukan sebagai penerima bansos.</p>
        @endif
        </div>
    @endif
@endsection
