@extends('layouts.infografis')

@section('title', 'Bantuan Sosial')

@section('infografis_content')

<h2 class="section-title mb-4">Rekapitulasi Bantuan Sosial {{ $tahunTerbaru }}</h2>

{{-- 1. Kartu Statistik Jenis Bansos (Looping dari database) --}}
@if($bansos->count() > 0)
    <div class="row g-4 mb-5">
        @foreach($bansos as $b)
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 p-3 d-flex flex-row align-items-center gap-3">
                <div class="bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 60px; height: 60px;">
                    <i class="bi bi-gift-fill fs-3"></i>
                </div>
                <div>
                    <h6 class="text-muted text-uppercase mb-1 small fw-bold">{{ $b->jenis_bansos }}</h6>
                    <h3 class="mb-0 fw-bold text-dark">{{ number_format($b->jumlah_penerima, 0, ',', '.') }} <span class="fs-6 text-muted fw-normal">KPM</span></h3>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@else
    <div class="alert alert-warning mb-5">Belum ada data rekap bansos tahun ini.</div>
@endif

{{-- 2. Form Cek Penerima --}}
<div class="card border-0 shadow rounded-4 overflow-hidden">
    <div class="card-header bg-primary text-white p-4">
        <h4 class="mb-0 fw-bold"><i class="bi bi-search me-2"></i> Cek Penerima Bantuan</h4>
        <p class="mb-0 text-white-50">Masukkan NIK untuk memeriksa status penerima.</p>
    </div>
    <div class="card-body p-4 p-lg-5 bg-light">
        <form action="{{ route('infografis.bansos') }}" method="GET" class="row g-3 justify-content-center">
            <div class="col-md-8">
                <input type="text" name="nik" class="form-control form-control-lg rounded-pill px-4" placeholder="Masukkan Nomor Induk Kependudukan (NIK)" value="{{ request('nik') }}" required onkeypress="return event.charCode >= 48 && event.charCode <= 57">
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill fw-bold">Cek Data</button>
            </div>
        </form>

        {{-- Hasil Pencarian --}}
        @if(request()->filled('nik'))
            <div class="mt-5">
                @if($hasilCariBansos)
                    <div class="alert alert-success d-flex align-items-center gap-3 rounded-4 p-4 shadow-sm border-0">
                        <i class="bi bi-check-circle-fill fs-1"></i>
                        <div>
                            <h5 class="fw-bold mb-1">Data Ditemukan!</h5>
                            <p class="mb-0">
                                Atas nama <strong>{{ $hasilCariBansos->nama }}</strong> ({{ substr($hasilCariBansos->nik, 0, 6) }}xxxxxx) terdaftar sebagai penerima manfaat.<br>
                                <small class="text-muted"><i class="bi bi-geo-alt-fill"></i> {{ $hasilCariBansos->alamat }}</small>
                            </p>
                        </div>
                    </div>
                @else
                    <div class="alert alert-danger d-flex align-items-center gap-3 rounded-4 p-4 shadow-sm border-0">
                        <i class="bi bi-x-circle-fill fs-1"></i>
                        <div>
                            <h5 class="fw-bold mb-1">Data Tidak Ditemukan</h5>
                            <p class="mb-0">NIK <strong>{{ request('nik') }}</strong> tidak terdaftar dalam basis data penerima bantuan saat ini.</p>
                        </div>
                    </div>
                @endif
            </div>
        @endif
    </div>
</div>

@endsection