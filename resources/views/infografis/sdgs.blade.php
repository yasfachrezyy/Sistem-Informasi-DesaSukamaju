@extends('layouts.infografis')
@section('title', 'SDGs Desa')
@section('content')
    <h2 class="section-title">SDGs Desa</h2>
    @if($sdg)
        <div class="grid">
            <div class="stat-card"><div class="label">Skor Total SDGs</div><div class="value">{{ $sdg->skor_total }}</div></div>
            <div class="stat-card"><div class="label">Desa Tanpa Kemiskinan</div><div class="value">{{ $sdg->desa_tanpa_kemiskinan }}</div></div>
            <div class="stat-card"><div class="label">Desa Tanpa Kelaparan</div><div class="value">{{ $sdg->desa_tanpa_kelaparan }}</div></div>
            {{-- Tambahkan kartu lain jika perlu --}}
        </div>
    @else
        <p>Data SDGs belum diisi.</p>
    @endif
@endsection
