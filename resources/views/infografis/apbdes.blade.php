@extends('layouts.infografis')

@section('title', 'APBDes')

@section('infografis_content')

{{-- Gaya Kustom untuk Kartu Statistik (Sama seperti halaman penduduk) --}}
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

    /* Variasi Warna untuk Kartu APBDes */
    .stat-card.pendapatan .icon-container { background-color: #e4f8f0; }
    .stat-card.pendapatan .icon-container svg { color: #20c997; }

    .stat-card.belanja .icon-container { background-color: #fdeeee; }
    .stat-card.belanja .icon-container svg { color: #dc3545; }

    .stat-card.pembiayaan .icon-container { background-color: #e6f4f1; }
    .stat-card.pembiayaan .icon-container svg { color: #17a2b8; }
</style>

    <h2 class="section-title">Anggaran Pendapatan dan Belanja Desa</h2>
    @if(isset($apbdes) && $apbdes)
        {{-- Kartu Statistik Anggaran dengan Desain Baru --}}
        <div class="grid">
            <div class="stat-card pendapatan">
                <div class="icon-container">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" /></svg>
                </div>
                <div class="info">
                    <div class="label">Total Pendapatan</div>
                    <div class="value">Rp {{ number_format($apbdes->total_pendapatan, 0, ',', '.') }}</div>
                </div>
            </div>
            <div class="stat-card belanja">
                <div class="icon-container">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6 9 12.75l4.286-4.286a11.948 11.948 0 0 1 4.306 6.43l.776 2.898m0 0-3.182-5.511m3.182 5.51-5.511-3.182" /></svg>
                </div>
                <div class="info">
                    <div class="label">Total Belanja</div>
                    <div class="value">Rp {{ number_format($apbdes->total_belanja, 0, ',', '.') }}</div>
                </div>
            </div>
             <div class="stat-card pembiayaan">
                 <div class="icon-container">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                 </div>
                <div class="info">
                    <div class="label">Total Pembiayaan</div>
                    <div class="value">Rp {{ number_format($apbdes->total_pembiayaan, 0, ',', '.') }}</div>
                </div>
            </div>
        </div>

        {{-- Bagan Perbandingan Anggaran --}}
        <div style="max-width: 800px; margin: 3rem auto;">
             <h3 style="text-align: center; margin-bottom: 1.5rem;">Perbandingan Pendapatan & Belanja</h3>
            <canvas id="apbdesChart"></canvas>
        </div>
    @else
        <p>Data APBDes belum diisi atau tidak tersedia saat ini.</p>
    @endif
@endsection

@push('scripts')
<script>
    @if(isset($apbdes) && $apbdes)
    const ctxApbdes = document.getElementById('apbdesChart').getContext('2d');
    new Chart(ctxApbdes, {
        type: 'bar',
        data: {
            labels: ['Anggaran Desa'],
            datasets: [{
                label: 'Pendapatan',
                data: [{{ $apbdes->total_pendapatan }}],
                backgroundColor: 'rgba(32, 201, 151, 0.8)',
                borderColor: 'rgba(32, 201, 151, 1)',
                borderWidth: 1,
                borderRadius: 5
            }, {
                label: 'Belanja',
                data: [{{ $apbdes->total_belanja }}],
                backgroundColor: 'rgba(220, 53, 69, 0.8)',
                borderColor: 'rgba(220, 53, 69, 1)',
                borderWidth: 1,
                borderRadius: 5
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value, index, values) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed.y !== null) {
                                label += 'Rp ' + context.parsed.y.toLocaleString('id-ID');
                            }
                            return label;
                        }
                    }
                }
            }
        }
    });
    @endif
</script>
@endpush

