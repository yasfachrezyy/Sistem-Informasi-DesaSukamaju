@extends('layouts.infografis')

@section('title', 'Demografi Penduduk')

@section('content')
    <h2 class="section-title">Demografi Penduduk</h2>
    @if($demografi)
        <div class="grid">
            <div class="stat-card">
                <div class="label">Total Penduduk</div>
                <div class="value">{{ number_format($demografi->total_penduduk) }}</div>
            </div>
            <div class="stat-card">
                <div class="label">Kepala Keluarga</div>
                <div class="value">{{ number_format($demografi->total_kepala_keluarga) }}</div>
            </div>
            <div class="stat-card">
                <div class="label">Perempuan</div>
                <div class="value">{{ number_format($demografi->total_perempuan) }}</div>
            </div>
            <div class="stat-card">
                <div class="label">Laki-laki</div>
                <div class="value">{{ number_format($demografi->total_laki_laki) }}</div>
            </div>
        </div>
    @else
        <p>Data demografi belum diisi.</p>
    @endif
@endsection
