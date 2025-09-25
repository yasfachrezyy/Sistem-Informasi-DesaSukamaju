@extends('layouts.infografis')
@section('title', 'APBDes')
@section('content')
    <h2 class="section-title">Anggaran Pendapatan dan Belanja Desa</h2>
    @if($apbdes)
        <table>
            <tr><th>Total Pendapatan</th><td>Rp {{ number_format($apbdes->total_pendapatan, 0, ',', '.') }}</td></tr>
            <tr><th>Total Belanja</th><td>Rp {{ number_format($apbdes->total_belanja, 0, ',', '.') }}</td></tr>
            <tr><th>Total Pembiayaan</th><td>Rp {{ number_format($apbdes->total_pembiayaan, 0, ',', '.') }}</td></tr>
        </table>
        {{-- Tempat untuk grafik detail --}}
    @else
        <p>Data APBDes belum diisi.</p>
    @endif
@endsection
