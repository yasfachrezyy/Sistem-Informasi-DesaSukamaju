@extends('layouts.infografis')

@section('title', 'Indeks Desa Membangun (IDM)')

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
    /* Khusus untuk status IDM yang berupa teks */
    .stat-card .info .value.text-value {
        font-size: 1.5rem; 
    }

    /* Variasi Warna untuk Kartu IDM */
    .stat-card.idm-status .icon-container { background-color: #eef8f5; }
    .stat-card.idm-status .icon-container svg { color: #28a745; }

    .stat-card.idm-skor .icon-container { background-color: #e3f2fd; }
    .stat-card.idm-skor .icon-container svg { color: #2196f3; }

    .stat-card.iks .icon-container { background-color: #fdeeee; }
    .stat-card.iks .icon-container svg { color: #dc3545; }
    
    .stat-card.ike .icon-container { background-color: #fef8e7; }
    .stat-card.ike .icon-container svg { color: #ffc107; }

    .stat-card.ikl .icon-container { background-color: #e6f4f1; }
    .stat-card.ikl .icon-container svg { color: #17a2b8; }
</style>

    <h2 class="section-title">Indeks Desa Membangun (IDM)</h2>
    @if(isset($idm) && $idm)
        <div class="grid">
            <div class="stat-card idm-status">
                <div class="icon-container">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                </div>
                <div class="info">
                    <div class="label">Status IDM</div>
                    <div class="value text-value">{{ $idm->status_idm }}</div>
                </div>
            </div>
            <div class="stat-card idm-skor">
                <div class="icon-container">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" /></svg>
                </div>
                <div class="info">
                    <div class="label">Skor IDM</div>
                    <div class="value">{{ $idm->skor_idm }}</div>
                </div>
            </div>
            <div class="stat-card iks">
                <div class="icon-container">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z" /></svg>
                </div>
                <div class="info">
                    <div class="label">Skor IKS</div>
                    <div class="value">{{ $idm->skor_iks }}</div>
                </div>
            </div>
            <div class="stat-card ike">
                <div class="icon-container">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V6.75m0 0h.75a.75.75 0 0 0 .75-.75V6m0 0h.375c.621 0 1.125-.504 1.125-1.125V4.5m0 0h13.5m-13.5 0H3.75m0 0v-.75a.75.75 0 0 1 .75-.75h.75M6 12h12M6 15h12M6 18h12" /></svg>
                </div>
                <div class="info">
                    <div class="label">Skor IKE</div>
                    <div class="value">{{ $idm->skor_ike }}</div>
                </div>
            </div>
            <div class="stat-card ikl">
                <div class="icon-container">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A11.953 11.953 0 0 1 12 13.5c-2.998 0-5.74-1.1-7.843-2.918m0 0A8.959 8.959 0 0 1 3 12c0-.778.099-1.533.284-2.253" /></svg>
                </div>
                <div class="info">
                    <div class="label">Skor IKL</div>
                    <div class="value">{{ $idm->skor_ikl }}</div>
                </div>
            </div>
        </div>

        <div style="max-width: 600px; margin: 3rem auto;">
            <h3 style="text-align: center; margin-bottom: 1.5rem;">Komponen Indeks Desa</h3>
            <canvas id="idmChart"></canvas>
        </div>
    @else
        <p>Data IDM belum diisi atau tidak tersedia saat ini.</p>
    @endif
@endsection

@push('scripts')
<script>
    @if(isset($idm) && $idm)
    const ctxIdm = document.getElementById('idmChart').getContext('2d');
    new Chart(ctxIdm, {
        type: 'radar',
        data: {
            labels: ['IKS (Sosial)', 'IKE (Ekonomi)', 'IKL (Lingkungan)'],
            datasets: [{
                label: 'Skor Indeks',
                data: [{{ $idm->skor_iks }}, {{ $idm->skor_ike }}, {{ $idm->skor_ikl }}],
                fill: true,
                backgroundColor: 'rgba(220, 53, 69, 0.2)',
                borderColor: 'rgba(220, 53, 69, 1)',
                pointBackgroundColor: 'rgba(220, 53, 69, 1)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgba(220, 53, 69, 1)'
            }]
        },
        options: {
            responsive: true,
            scales: {
                r: {
                    angleLines: {
                        display: true
                    },
                    suggestedMin: 0,
                    suggestedMax: 1
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
    @endif
</script>
@endpush
