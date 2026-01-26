@extends('layouts.infografis')

@section('title', 'Data Stunting')

@section('infografis_content')

{{-- Gaya Kustom untuk Kartu Statistik (Sama seperti halaman lainnya) --}}
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

    /* Variasi Warna untuk Kartu Stunting */
    .stat-card.stunting .icon-container { background-color: #fff0e9; }
    .stat-card.stunting .icon-container svg { color: #ff6f00; }
    
    .stat-card.balita .icon-container { background-color: #e3f2fd; }
    .stat-card.balita .icon-container svg { color: #2196f3; }

</style>

    <h2 class="section-title">Data Stunting Desa</h2>
    @if(isset($stunting) && $stunting)
        <div class="grid">
            <div class="stat-card stunting">
                <div class="icon-container">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" /></svg>
                </div>
                <div class="info">
                    <div class="label">Jumlah Kasus Stunting</div>
                    <div class="value">{{ number_format($stunting->jumlah_kasus) }}</div>
                </div>
            </div>
            <div class="stat-card balita">
                <div class="icon-container">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m-7.5-2.962A3 3 0 0 1 3 18.72v-2.172c0-.923.38-1.79.998-2.396C5.08 13.542 6.504 13 8.25 13H15M12 3v10.5A2.25 2.25 0 0 1 9.75 15.75H8.25A2.25 2.25 0 0 1 6 13.5V12m6 0v-1.5c0-.923.38-1.79.998-2.396C13.92 7.542 15.346 7 17.1 7H18" /></svg>
                </div>
                <div class="info">
                    <div class="label">Total Balita</div>
                    <div class="value">{{ number_format($stunting->total_balita) }}</div>
                </div>
            </div>
        </div>
        
        <div style="max-width: 800px; margin: 3rem auto;">
            <h3 style="text-align: center; margin-bottom: 1.5rem;">Persentase Kasus Stunting</h3>
            <canvas id="stuntingChart"></canvas>
        </div>
    @else
        <p>Data stunting belum diisi atau tidak tersedia saat ini.</p>
    @endif
@endsection

@push('scripts')
<script>
    @if(isset($stunting) && $stunting && $stunting->total_balita > 0)
    const ctxStunting = document.getElementById('stuntingChart').getContext('2d');
    const balitaSehat = {{ $stunting->total_balita - $stunting->jumlah_kasus }};
    const kasusStunting = {{ $stunting->jumlah_kasus }};

    new Chart(ctxStunting, {
        type: 'pie',
        data: {
            labels: ['Balita Sehat', 'Kasus Stunting'],
            datasets: [{
                label: 'Jumlah Balita',
                data: [balitaSehat, kasusStunting],
                backgroundColor: [
                    'rgba(33, 150, 243, 0.8)',
                    'rgba(255, 111, 0, 0.8)',
                ],
                borderColor: '#fff',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed !== null) {
                                label += context.parsed.toLocaleString('id-ID') + ' anak';
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
