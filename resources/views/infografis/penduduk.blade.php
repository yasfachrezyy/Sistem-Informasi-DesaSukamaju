@extends('layouts.infografis')

@section('title', 'Demografi Penduduk')

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

    /* Variasi Warna untuk Setiap Kartu */
    .stat-card.total-penduduk .icon-container { background-color: #e9f7fe; }
    .stat-card.total-penduduk .icon-container svg { color: #03a9f4; }

    .stat-card.kepala-keluarga .icon-container { background-color: #fff8e1; }
    .stat-card.kepala-keluarga .icon-container svg { color: #ffb300; }

    .stat-card.perempuan .icon-container { background-color: #fce4ec; }
    .stat-card.perempuan .icon-container svg { color: #ec407a; }

    .stat-card.laki-laki .icon-container { background-color: #e8eaf6; }
    .stat-card.laki-laki .icon-container svg { color: #3f51b5; }
</style>

    <h2 class="section-title">Demografi Penduduk</h2>
    @if(isset($demografi) && $demografi)
        {{-- Kartu Statistik dengan Desain Baru --}}
        <div class="grid">
            <div class="stat-card total-penduduk">
                <div class="icon-container">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m-7.5-2.962A3 3 0 0 1 3 18.72v-2.172c0-.923.38-1.79.998-2.396C5.08 13.542 6.504 13 8.25 13H15M12 3v10.5A2.25 2.25 0 0 1 9.75 15.75H8.25A2.25 2.25 0 0 1 6 13.5V12m6 0v-1.5c0-.923.38-1.79.998-2.396C13.92 7.542 15.346 7 17.1 7H18" /></svg>
                </div>
                <div class="info">
                    <div class="label">Total Penduduk</div>
                    <div class="value">{{ number_format($demografi->total_penduduk) }}</div>
                </div>
            </div>
            <div class="stat-card kepala-keluarga">
                <div class="icon-container">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" /></svg>
                </div>
                 <div class="info">
                    <div class="label">Kepala Keluarga</div>
                    <div class="value">{{ number_format($demografi->total_kepala_keluarga) }}</div>
                </div>
            </div>
            <div class="stat-card perempuan">
                <div class="icon-container">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" /></svg>
                </div>
                <div class="info">
                    <div class="label">Perempuan</div>
                    <div class="value">{{ number_format($demografi->total_perempuan) }}</div>
                </div>
            </div>
            <div class="stat-card laki-laki">
                <div class="icon-container">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" /></svg>
                </div>
                <div class="info">
                    <div class="label">Laki-laki</div>
                    <div class="value">{{ number_format($demografi->total_laki_laki) }}</div>
                </div>
            </div>
        </div>

        {{-- Bagan Distribusi Gender --}}
        <div style="max-width: 400px; margin: 3rem auto;">
            <h3 style="text-align: center; margin-bottom: 1.5rem;">Distribusi Gender</h3>
            <canvas id="genderChart"></canvas>
        </div>

    @else
        <p>Data demografi belum diisi atau tidak tersedia saat ini.</p>
    @endif
@endsection

@push('scripts')
<script>
    // Pastikan data demografi ada sebelum menjalankan skrip
    @if(isset($demografi) && $demografi)
    const ctx = document.getElementById('genderChart').getContext('2d');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Laki-laki', 'Perempuan'],
            datasets: [{
                label: 'Jumlah Penduduk',
                data: [{{ $demografi->total_laki_laki }}, {{ $demografi->total_perempuan }}],
                backgroundColor: [
                    '#3f51b5', // Biru
                    '#ec407a'  // Merah muda
                ],
                borderColor: '#fff',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed !== null) {
                                label += context.parsed.toLocaleString('id-ID') + ' Jiwa';
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

