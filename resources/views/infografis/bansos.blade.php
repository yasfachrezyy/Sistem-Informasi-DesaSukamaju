@extends('layouts.infografis')

@section('title', 'Bantuan Sosial')

@section('infografis_content')

{{-- Gaya Kustom untuk Kartu Statistik & Form Pencarian --}}
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

    /* Warna Kustom untuk Kartu Bansos */
    .stat-card.bansos-1 .icon-container { background-color: #eef8f5; }
    .stat-card.bansos-1 .icon-container svg { color: #28a745; }

    .stat-card.bansos-2 .icon-container { background-color: #fef8e7; }
    .stat-card.bansos-2 .icon-container svg { color: #ffc107; }
    
    .stat-card.bansos-3 .icon-container { background-color: #e6f4f1; }
    .stat-card.bansos-3 .icon-container svg { color: #17a2b8; }
    
    .search-form {
        display: flex;
        gap: 0.75rem;
        background-color: #f8f9fa;
        padding: 1rem;
        border-radius: 8px;
    }
    .search-form input {
        flex-grow: 1;
        padding: 0.75rem 1rem;
        border: 1px solid #ced4da;
        border-radius: 8px;
        font-size: 1rem;
    }
    .search-form button {
        padding: 0.75rem 1.5rem;
        border: none;
        background-color: #dc3545;
        color: white;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        transition: background-color 0.2s;
    }
    .search-form button:hover {
        background-color: #c82333;
    }
    .search-result {
        padding: 1.5rem;
        border: 1px solid #ddd;
        border-radius: 8px;
        margin-top: 1.5rem;
        background-color: #e9ecef;
    }
</style>

    <h2 class="section-title">Bantuan Sosial (Bansos)</h2>
    
    @if(isset($bansos) && $bansos->isNotEmpty())
        <div class="grid">
            @foreach($bansos as $b)
                {{-- Gunakan modulo untuk rotasi warna kartu --}}
                <div class="stat-card bansos-{{ ($loop->index % 3) + 1 }}">
                    <div class="icon-container">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 11.25v8.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5v-8.25M12 4.875A3.375 3.375 0 0 0 8.625 1.5H7.5c-1.72 0-3.223 1.17-3.687 2.859a2.25 2.25 0 0 0 .337 2.191l.54 1.08a2.25 2.25 0 0 0 2.006 1.41h4.692a2.25 2.25 0 0 0 2.006-1.41l.54-1.08a2.25 2.25 0 0 0 .337-2.191A3.375 3.375 0 0 0 12 4.875Z" /></svg>
                    </div>
                    <div class="info">
                        <div class="label">{{ $b->jenis_bansos }}</div>
                        <div class="value">{{ number_format($b->jumlah_penerima) }} Orang</div>
                    </div>
                </div>
            @endforeach
        </div>

        <div style="max-width: 800px; margin: 3rem auto;">
            <h3 style="text-align: center; margin-bottom: 1.5rem;">Distribusi Penerima Bantuan</h3>
            <canvas id="bansosChart"></canvas>
        </div>
    @else
        <p>Data ringkasan bansos belum diisi.</p>
    @endif

    <hr style="margin: 3rem 0;">

    <h3 style="text-align: center; margin-bottom: 1.5rem;">Cek Penerima Bansos Individu</h3>
    <form action="{{ route('infografis.bansos') }}" method="GET" class="search-form">
        <input type="text" name="nik" placeholder="Masukkan NIK Anda (16 digit)..." value="{{ request('nik') }}" minlength="16" maxlength="16" required>
        <button type="submit">Cari Data</button>
    </form>

    @if(request()->filled('nik'))
        <div class="search-result">
        @if(isset($hasilCariBansos) && $hasilCariBansos)
            <p><strong><i class="bi bi-check-circle-fill text-success"></i> Data Ditemukan:</strong><br>
            Nama: {{ $hasilCariBansos->nama }}<br>
            NIK: {{ $hasilCariBansos->nik }}<br>
            Alamat: {{ $hasilCariBansos->alamat }}</p>
        @else
            <p><strong><i class="bi bi-x-circle-fill text-danger"></i> Data Tidak Ditemukan:</strong><br> NIK "{{ request('nik') }}" tidak terdaftar sebagai penerima bansos.</p>
        @endif
        </div>
    @endif
@endsection

@push('scripts')
<script>
    @if(isset($bansos) && $bansos->isNotEmpty())
    const ctxBansos = document.getElementById('bansosChart').getContext('2d');
    new Chart(ctxBansos, {
        type: 'bar',
        data: {
            labels: [ @foreach($bansos as $b) '{{ $b->jenis_bansos }}', @endforeach ],
            datasets: [{
                label: 'Jumlah Penerima',
                data: [ @foreach($bansos as $b) {{ $b->jumlah_penerima }}, @endforeach ],
                backgroundColor: [
                    'rgba(40, 167, 69, 0.8)',
                    'rgba(255, 193, 7, 0.8)',
                    'rgba(23, 162, 184, 0.8)'
                ],
                borderColor: [
                    'rgba(40, 167, 69, 1)',
                    'rgba(255, 193, 7, 1)',
                    'rgba(23, 162, 184, 1)'
                ],
                borderWidth: 1,
                borderRadius: 5
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return ' ' + context.parsed.y.toLocaleString('id-ID') + ' Orang';
                        }
                    }
                }
            }
        }
    });
    @endif
</script>
@endpush
