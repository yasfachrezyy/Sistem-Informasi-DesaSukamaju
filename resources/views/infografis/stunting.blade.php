@extends('layouts.infografis')
@section('title', 'Data Stunting')
@section('content')
    <h2 class="section-title">Stunting</h2>
    @if($stunting)
        <div class="grid">
            <div class="stat-card">
                <div class="label">Jumlah Kasus Stunting</div>
                <div class="value">{{ number_format($stunting->jumlah_kasus) }}</div>
            </div>
        </div>
    @else
        <p>Data stunting belum diisi.</p>
    @endif
@endsection
