@extends('layouts.infografis')

@section('title', 'SDGs Desa')

@section('infografis_content')

{{-- Gaya Kustom untuk Kartu Statistik --}}
<style>
    .stat-card {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1.25rem;
        background-color: #fff;
        border: 1px solid #e9ecef;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.02);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.07);
    }
    .stat-card .icon-container {
        flex-shrink: 0;
        width: 56px;
        height: 56px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .stat-card .icon-container svg {
        width: 28px;
        height: 28px;
    }
    .stat-card .info .label {
        font-size: 0.95rem;
        color: #6c757d;
        margin: 0;
        line-height: 1.4;
    }
    .stat-card .info .value {
        font-size: 2rem;
        font-weight: 700;
        color: #212529;
        line-height: 1.2;
    }

    /* Variasi Warna untuk Kartu SDGs */
    .stat-card.sdg-total .icon-container { background-color: #e3f2fd; }
    .stat-card.sdg-total .icon-container svg { color: #2196f3; }

    .stat-card.sdg-1 .icon-container { background-color: #fdeeee; }
    .stat-card.sdg-1 .icon-container svg { color: #e5243b; }

    .stat-card.sdg-2 .icon-container { background-color: #fef8e7; }
    .stat-card.sdg-2 .icon-container svg { color: #dda63a; }

    .stat-card.sdg-3 .icon-container { background-color: #eef8f5; }
    .stat-card.sdg-3 .icon-container svg { color: #4c9f38; }

</style>

    <h2 class="section-title">SDGs (Tujuan Pembangunan Berkelanjutan) Desa</h2>
    @if(isset($sdg) && $sdg)
        <div class="grid">
            <div class="stat-card sdg-total">
                <div class="icon-container">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" /></svg>
                </div>
                <div class="info">
                    <div class="label">Skor Total SDGs</div>
                    <div class="value">{{ number_format($sdg->skor_total, 2) }}</div>
                </div>
            </div>
            <div class="stat-card sdg-1">
                <div class="icon-container">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" /></svg>
                </div>
                <div class="info">
                    <div class="label">1. Desa Tanpa Kemiskinan</div>
                    <div class="value">{{ number_format($sdg->desa_tanpa_kemiskinan, 2) }}</div>
                </div>
            </div>
            <div class="stat-card sdg-2">
                <div class="icon-container">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 9.75-2.25 9.75m16.5 0a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm-9.152 9.152a.75.75 0 0 0-1.06 0l-4.5 4.5a.75.75 0 0 0 1.06 1.06l4.5-4.5a.75.75 0 0 0 0-1.06Zm4.5-4.5a.75.75 0 0 0-1.06 0l-4.5 4.5a.75.75 0 0 0 1.06 1.06l4.5-4.5a.75.75 0 0 0 0-1.06Z" /></svg>
                </div>
                <div class="info">
                    <div class="label">2. Desa Tanpa Kelaparan</div>
                    <div class="value">{{ number_format($sdg->desa_tanpa_kelaparan, 2) }}</div>
                </div>
            </div>
            <div class="stat-card sdg-3">
                <div class="icon-container">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" /></svg>
                </div>
                <div class="info">
                    <div class="label">3. Desa Sehat Sejahtera</div>
                    <div class="value">{{ number_format($sdg->desa_sehat_sejahtera, 2) }}</div>
                </div>
            </div>
        </div>

        <div style="max-width: 900px; margin: 3rem auto;">
            <h3 style="text-align: center; margin-bottom: 1.5rem;">Skor Komponen SDGs Desa</h3>
            <canvas id="sdgsChart"></canvas>
        </div>
    @else
        <p>Data SDGs belum diisi atau tidak tersedia saat ini.</p>
    @endif
@endsection

@push('scripts')
<script>
    @if(isset($sdg) && $sdg)
    const ctxSdgs = document.getElementById('sdgsChart').getContext('2d');
    
    // Anggap saja kita punya lebih banyak data di variabel $sdg
    const sdgLabels = [
        '1. Tanpa Kemiskinan', 
        '2. Tanpa Kelaparan', 
        '3. Sehat & Sejahtera',
        '4. Pendidikan Berkualitas',
        '5. Kesetaraan Gender',
        '6. Air Bersih & Sanitasi'
    ];
    const sdgData = [
        {{ $sdg->desa_tanpa_kemiskinan }},
        {{ $sdg->desa_tanpa_kelaparan }},
        {{ $sdg->desa_sehat_sejahtera }},
        {{ $sdg->pendidikan_berkualitas ?? 0 }}, // Gunakan null coalescing jika data mungkin tidak ada
        {{ $sdg->kesetaraan_gender ?? 0 }},
        {{ $sdg->air_bersih_sanitasi ?? 0 }}
    ];

    new Chart(ctxSdgs, {
        type: 'bar',
        data: {
            labels: sdgLabels,
            datasets: [{
                label: 'Skor SDGs',
                data: sdgData,
                backgroundColor: 'rgba(220, 53, 69, 0.7)',
                borderColor: 'rgba(220, 53, 69, 1)',
                borderWidth: 1,
                borderRadius: 5
            }]
        },
        options: {
            indexAxis: 'y', // Membuat bar chart menjadi horizontal
            responsive: true,
            scales: {
                x: {
                    beginAtZero: true,
                    suggestedMax: 100 // Asumsi skor maksimal 100
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
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
