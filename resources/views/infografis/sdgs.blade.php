@extends('layouts.infografis')

@section('title', 'SDGs Desa')

@section('infografis_content')

{{-- Gaya Kustom --}}
<style>
    .sdg-card-main {
        background: linear-gradient(135deg, #0d6efd 0%, #0dcaf0 100%);
        color: white;
        border: none;
        border-radius: 16px;
        position: relative;
        overflow: hidden;
        transition: transform 0.3s;
    }
    .sdg-card-main:hover {
        transform: translateY(-5px);
    }
    .sdg-card-main::before {
        content: '';
        position: absolute;
        top: -50px;
        right: -50px;
        width: 200px;
        height: 200px;
        background: rgba(255, 255, 255, 0.15);
        border-radius: 50%;
    }
    .sdg-icon-large {
        font-size: 3.5rem;
        color: rgba(255, 255, 255, 0.8);
    }
</style>

{{-- Header & Filter Tahun --}}
<div class="row align-items-center mb-5 gy-3">
    <div class="col-md-8">
        <h2 class="section-title mb-0 text-center text-md-start">Capaian SDGs Desa {{ $currentYear }}</h2>
        <p class="text-muted text-center text-md-start mb-0">Tujuan Pembangunan Berkelanjutan Desa.</p>
    </div>
    <div class="col-md-4">
        <form action="{{ route('infografis.sdgs') }}" method="GET">
            <div class="input-group shadow-sm rounded-pill overflow-hidden border">
                <span class="input-group-text bg-white border-0 ps-3 fw-bold text-secondary small text-uppercase">Tahun</span>
                <select name="tahun" class="form-select border-0 bg-light fw-bold text-dark text-center" style="cursor: pointer;" onchange="this.form.submit()">
                    @forelse($years as $year)
                        <option value="{{ $year }}" {{ $currentYear == $year ? 'selected' : '' }}>{{ $year }}</option>
                    @empty
                        <option value="{{ date('Y') }}">{{ date('Y') }}</option>
                    @endforelse
                </select>
            </div>
        </form>
    </div>
</div>

@if(isset($sdg) && $sdg)
    {{-- 1. Skor Rata-rata (Highlight) --}}
    <div class="row justify-content-center mb-5">
        <div class="col-lg-8">
            <div class="card sdg-card-main shadow-lg p-4">
                <div class="d-flex align-items-center justify-content-between position-relative z-1">
                    <div>
                        <h6 class="text-white-50 text-uppercase ls-1 mb-2">Skor Rata-Rata SDGs</h6>
                        <h1 class="display-3 fw-bold mb-0">{{ number_format($sdg->skor_total, 2) }}</h1>
                        <p class="mb-0 mt-2 text-white-50 small"><i class="bi bi-info-circle me-1"></i> Dari skala 0 - 100</p>
                    </div>
                    <div class="sdg-icon-large pe-3">
                        <i class="bi bi-globe-americas"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Persiapkan Data Chart dari Kolom Database --}}
    @php
        // Mapping Label ke Data Database
        $goals = [
            '1. Desa Tanpa Kemiskinan' => $sdg->desa_tanpa_kemiskinan,
            '2. Desa Tanpa Kelaparan' => $sdg->desa_tanpa_kelaparan,
            '3. Desa Sehat & Sejahtera' => $sdg->desa_sehat_sejahtera,
            '4. Pendidikan Berkualitas' => $sdg->pendidikan_desa_berkualitas,
            '5. Keterlibatan Perempuan' => $sdg->keterlibatan_perempuan_desa,
            '6. Layak Air Bersih' => $sdg->desa_layak_air_bersih,
            '7. Energi Bersih' => $sdg->desa_berenergi_bersih,
            '8. Pertumbuhan Ekonomi' => $sdg->pertumbuhan_ekonomi_merata,
            '9. Infrastruktur & Inovasi' => $sdg->infrastruktur_inovasi,
            '10. Desa Tanpa Kesenjangan' => $sdg->desa_tanpa_kesenjangan,
            '11. Pemukiman Aman' => $sdg->kawasan_pemukiman_aman,
            '12. Konsumsi Sadar Lingkungan' => $sdg->konsumsi_produksi_sadar_lingkungan,
            '13. Tanggap Perubahan Iklim' => $sdg->desa_tanggap_perubahan_iklim,
            '14. Peduli Lingkungan Laut' => $sdg->desa_peduli_lingkungan_laut,
            '15. Peduli Lingkungan Darat' => $sdg->desa_peduli_lingkungan_darat,
            '16. Damai & Berkeadilan' => $sdg->desa_damai_berkeadilan,
            '17. Kemitraan Pembangunan' => $sdg->kemitraan_pembangunan_desa,
            '18. Kelembagaan Dinamis' => $sdg->kelembagaan_desa_dinamis,
        ];
        
        // Mengubah array PHP ke JSON untuk JS
        $labels = json_encode(array_keys($goals));
        $data = json_encode(array_values($goals));
    @endphp

    {{-- 2. Grafik Batang Horizontal --}}
    <div class="card border-0 shadow-sm rounded-4 p-4">
        <h5 class="fw-bold text-secondary mb-4 text-center">Detail Capaian Per Tujuan (Goal)</h5>
        <div style="height: 800px; position: relative;">
            <canvas id="sdgsChart"></canvas>
        </div>
    </div>

@else
    <div class="alert alert-warning text-center mt-4 d-flex flex-column flex-md-row align-items-center justify-content-center gap-3 py-4">
        <i class="bi bi-exclamation-triangle-fill fs-3 text-warning"></i>
        <div class="text-center text-md-start">
            <strong>Data Tidak Ditemukan!</strong><br>
            Belum ada data SDGs yang diinput untuk tahun <strong>{{ $currentYear }}</strong>.
        </div>
    </div>
@endif

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    @if(isset($sdg) && $sdg)
    const ctxSdgs = document.getElementById('sdgsChart').getContext('2d');
    
    // Array Warna SDGs Global (Approximation)
    const sdgColors = [
        '#e5243b', '#dda63a', '#4c9f38', '#c5192d', '#ff3a21', '#26bde2', 
        '#fcc30b', '#a21942', '#fd6925', '#dd1367', '#fd9d24', '#bf8b2e', 
        '#3f7e44', '#0a97d9', '#56c02b', '#00689d', '#19486a', '#00689d'
    ];

    new Chart(ctxSdgs, {
        type: 'bar',
        data: {
            labels: {!! $labels !!},
            datasets: [{
                label: 'Skor Capaian',
                data: {!! $data !!},
                backgroundColor: sdgColors,
                borderColor: sdgColors,
                borderWidth: 1,
                borderRadius: 4,
                barPercentage: 0.7
            }]
        },
        options: {
            indexAxis: 'y', // Membuat bar chart horizontal
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: { 
                    beginAtZero: true, 
                    max: 100,
                    grid: { color: '#f0f0f0' }
                }, 
                y: { 
                    ticks: { 
                        autoSkip: false, 
                        font: { size: 12, family: "'Poppins', sans-serif" } 
                    },
                    grid: { display: false }
                }
            },
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: 'rgba(0,0,0,0.8)',
                    padding: 12,
                    callbacks: {
                        label: function(context) {
                            return ' Skor: ' + context.parsed.x.toFixed(2);
                        }
                    }
                }
            }
        }
    });
    @endif
</script>
@endpush