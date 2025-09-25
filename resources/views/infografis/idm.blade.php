@extends('layouts.infografis')
@section('title', 'Indeks Desa Membangun (IDM)')
@section('content')
    <h2 class="section-title">Indeks Desa Membangun (IDM)</h2>
    @if($idm)
        <div class="grid">
            <div class="stat-card"><div class="label">Status IDM</div><div class="value">{{ $idm->status_idm }}</div></div>
            <div class="stat-card"><div class="label">Skor IDM</div><div class="value">{{ $idm->skor_idm }}</div></div>
            <div class="stat-card"><div class="label">Skor IKS</div><div class="value">{{ $idm->skor_iks }}</div></div>
            <div class="stat-card"><div class="label">Skor IKE</div><div class="value">{{ $idm->skor_ike }}</div></div>
            <div class="stat-card"><div class="label">Skor IKL</div><div class="value">{{ $idm->skor_ikl }}</div></div>
        </div>
    @else
        <p>Data IDM belum diisi.</p>
    @endif
@endsection
