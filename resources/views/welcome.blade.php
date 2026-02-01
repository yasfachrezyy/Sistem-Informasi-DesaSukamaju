<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Website Resmi Desa Sukamaju</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            padding-top: 76px;
        }

        :root {
            --primary-color: #008000;
            --secondary-color: #0f5132;
        }

        /* Navbar Styling */
        .navbar {
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 12px 0;
        }
        .nav-link {
            font-weight: 500;
            color: #444;
            padding: 8px 16px !important;
            transition: all 0.3s;
        }
        .nav-link.active, .nav-link:hover {
            color: var(--primary-color);
        }

        /* Hero Carousel */
        .hero-carousel .carousel-item {
            height: 90vh;
            min-height: 500px;
            background-size: cover;
            background-position: center;
            position: relative;
        }
        .hero-carousel .carousel-item::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0,0,0,0.4); 
        }
        .hero-carousel .carousel-caption {
            bottom: 30%;
            z-index: 2;
        }
        .hero-carousel h1 {
            font-size: 3.5rem;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        /* Section Titles */
        .section-title {
            text-align: center;
            margin-bottom: 3rem;
            font-weight: 700;
            position: relative;
            color: var(--secondary-color);
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .section-title::after {
            content: '';
            display: block;
            width: 60px;
            height: 4px;
            background: var(--primary-color);
            margin: 15px auto 0;
            border-radius: 2px;
        }

        /* Card Effects */
        .card-hover-effect {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card-hover-effect:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
        }

        /* Dashboard Widget Style (Untuk Admin & APB) */
        .dashboard-card {
            background: #fff;
            border-radius: 20px;
            border: 1px solid rgba(0,0,0,0.05);
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            overflow: hidden;
            height: 100%;
            transition: transform 0.3s ease;
        }
        .dashboard-card:hover {
            transform: translateY(-5px);
        }
        .dashboard-header {
            padding: 20px 25px;
            background: linear-gradient(to right, #f8f9fa, #fff);
            border-bottom: 1px solid rgba(0,0,0,0.05);
            display: flex;
            align-items: center;
        }
        .icon-box {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 1.25rem;
        }
        
        /* Footer */
        .footer {
            background-color: #222;
            color: #bbb;
        }
        .footer a:hover { color: var(--primary-color); }

    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="{{ asset('images/logo-desa.png') }}" alt="Logo" height="40">
                <div class="d-flex flex-column ms-2">
                    <span class="fw-bold text-dark lh-1">Desa Sukamaju</span>
                    <span style="font-size: 0.75rem; color: #666;">Kabupaten Cianjur</span>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('profil') ? 'active' : '' }}" href="{{ route('profil') }}">Profil Desa</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('infografis.*') ? 'active' : '' }}" href="{{ route('infografis.index') }}">Infografis</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('berita.*') ? 'active' : '' }}" href="{{ route('berita.index') }}">Berita</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('belanja.*') ? 'active' : '' }}" href="{{ route('belanja.umkm') }}">Belanja</a></li>
                </ul>
                <div class="ms-lg-3 mt-3 mt-lg-0">
                    <a href="/admin" class="btn btn-primary px-4 rounded-pill">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Login
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <header id="hero-carousel" class="carousel slide hero-carousel" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url('{{ asset('images/kantor-desa.jpg') }}');">
                <div class="carousel-caption">
                    <h1>Selamat Datang</h1>
                    <p class="fs-5">Website Resmi Pemerintah Desa Sukamaju, Kabupaten Cianjur.</p>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('{{ asset('images/hero-bg.jpg') }}');">
                <div class="carousel-caption">
                    <h1>Potensi Alam</h1>
                    <p class="fs-5">Menjelajahi keindahan alam dan potensi agrowisata desa.</p>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('{{ asset('images/phbn.jpg') }}');">
                <div class="carousel-caption">
                    <h1>Guyub Rukun</h1>
                    <p class="fs-5">Semangat gotong royong dan kebersamaan warga masyarakat.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </header>

    <main>
        <section id="sambutan" class="py-5 bg-white">
            <div class="container py-4">
                <div class="row align-items-center g-5">
                    <div class="col-lg-4 text-center">
                        <div class="position-relative d-inline-block">
                            <img src="{{ asset('images/struktural/kades.jpg') }}" class="img-fluid rounded-circle shadow" style="width: 280px; height: 280px; object-fit: cover; border: 8px solid #f8f9fa;" alt="Kepala Desa">
                            <div class="badge bg-success text-white px-4 py-2 rounded-pill position-absolute bottom-0 start-50 translate-middle-x shadow-sm">
                                <span class="fw-bold">Kepala Desa</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <h2 class="fw-bold text-dark mb-2">Sambutan Kepala Desa</h2>
                        <h4 class="text-success mb-4">Hendri, S.IP</h4>
                        <p class="text-secondary" style="line-height: 1.8; text-align: justify;">
                            "Assalamualaikum Wr. Wb. Puji syukur kehadirat Allah SWT. Website ini hadir sebagai wujud transparansi dan peningkatan pelayanan publik. Kami berkomitmen untuk mewujudkan Desa Sukamaju yang Mandiri, Sejahtera, dan Berakhlak Mulia melalui pemanfaatan teknologi informasi."
                        </p>
                        <div class="mt-4">
                            <a href="{{ route('profil') }}" class="btn btn-outline-success rounded-pill px-4">
                                Baca Profil Lengkap <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('partials._jelajahi')
        @include('partials._peta')

        <section class="py-5 bg-light position-relative">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="section-title">Pemerintahan Desa</h2>
                    <p class="text-muted">Aparatur desa yang siap melayani masyarakat</p>
                </div>

                <div class="row g-4 gy-5 justify-content-center">
                    @foreach($aparaturs->take(4) as $orang)
                    <div class="col-lg-3 col-md-6 pt-4"> <div class="card h-100 border-0 shadow-sm text-center card-hover-effect" style="border-radius: 20px; overflow: visible;">
                            <div class="position-relative">
                                <img src="{{ $orang->foto ? asset('storage/' . $orang->foto) : 'https://ui-avatars.com/api/?name='.urlencode($orang->nama) }}" 
                                     class="rounded-circle shadow-sm bg-white" 
                                     style="width: 120px; height: 120px; object-fit: cover; border: 5px solid #fff; margin-top: -60px;"
                                     alt="{{ $orang->nama }}">
                            </div>
                            <div class="card-body pt-4 pb-4">
                                <h5 class="fw-bold text-dark mb-1">{{ $orang->nama }}</h5>
                                <div class="d-inline-block px-3 py-1 rounded-pill bg-light text-success fw-bold small text-uppercase mt-2 border border-success-subtle">
                                    {{ $orang->jabatan }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="text-center mt-5">
                    <a href="{{ route('profil') }}#aparatur" class="btn btn-primary px-5 rounded-pill shadow-sm">
                        Lihat Seluruh Aparatur
                    </a>
                </div>
            </div>
        </section>

        <section class="py-5 bg-white">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-6">
                        <div class="dashboard-card">
                            <div class="dashboard-header">
                                <div class="icon-box bg-success-subtle text-success">
                                    <i class="bi bi-people-fill"></i>
                                </div>
                                <div>
                                    <h4 class="fw-bold mb-0 text-dark">Demografi Penduduk</h4>
                                    <small class="text-muted">Update Data Terbaru</small>
                                </div>
                            </div>
                            <div class="p-4">
                                @include('partials._administrasi')
                                <div class="mt-4 text-center">
                                    <a href="{{ route('infografis.index') }}" class="btn btn-sm btn-outline-dark rounded-pill px-4">
                                        Lihat Statistik Lengkap <i class="bi bi-chevron-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="dashboard-card">
                            <div class="dashboard-header">
                                <div class="icon-box bg-warning-subtle text-warning">
                                    <i class="bi bi-wallet2"></i>
                                </div>
                                <div>
                                    <h4 class="fw-bold mb-0 text-dark">APB Desa 2024</h4>
                                    <small class="text-muted">Transparansi Anggaran</small>
                                </div>
                            </div>
                            <div class="p-4">
                                @include('partials._apb')
                                <div class="mt-4 text-center">
                                    <a href="{{ route('infografis.apbdes') }}#apb" class="btn btn-sm btn-outline-dark rounded-pill px-4">
                                        Rincian Realisasi <i class="bi bi-chevron-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="berita" class="py-5 bg-light">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <h2 class="section-title mb-0 text-start m-0">Kabar Desa</h2>
                    <a href="{{ route('berita.index') }}" class="btn btn-link text-success text-decoration-none fw-bold">
                        Lihat Semua <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
                
                <div class="row g-4">
                    @forelse($beritas->take(3) as $item)
                    <div class="col-md-4">
                        <div class="card card-news h-100 shadow-sm border-0 rounded-4 overflow-hidden card-hover-effect">
                            <div class="position-relative">
                                <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" style="height: 220px; object-fit: cover;" alt="{{ $item->judul }}">
                                <div class="bg-success text-white position-absolute top-0 start-0 px-3 py-1 m-3 rounded-pill small fw-bold shadow">
                                    Berita
                                </div>
                            </div>
                            <div class="card-body d-flex flex-column p-4">
                                <small class="text-muted mb-2 d-block">
                                    <i class="bi bi-calendar3 me-1"></i> {{ $item->created_at->translatedFormat('d F Y') }}
                                </small>
                                <h5 class="card-title fw-bold mb-3 text-dark lh-sm">
                                    <a href="{{ route('berita.show', $item->slug) }}" class="text-decoration-none text-dark stretched-link">
                                        {{ Str::limit($item->judul, 50) }}
                                    </a>
                                </h5>
                                <p class="card-text text-secondary small mb-4 flex-grow-1">
                                    {{ Str::limit(strip_tags($item->konten), 90) }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center py-5">
                        <div class="text-muted fst-italic">Belum ada berita terbaru saat ini.</div>
                    </div>
                    @endforelse
                </div>
            </div>
        </section>
        
        <section id="potensi" class="py-5 bg-white">
            <div class="container">
                <h2 class="section-title">Potensi Unggulan</h2>
                <div class="row g-4 text-center">
                    <div class="col-md-6 col-lg-3">
                        <div class="card h-100 p-4 border-0 shadow-sm bg-light card-hover-effect">
                            <div class="mb-3 text-success"><i class="bi bi-tree-fill display-4"></i></div>
                            <h5 class="fw-bold">Pertanian</h5>
                            <p class="small text-muted mb-0">Lumbung padi berkualitas dengan sistem irigasi teknis.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card h-100 p-4 border-0 shadow-sm bg-light card-hover-effect">
                            <div class="mb-3 text-success"><i class="bi bi-shop display-4"></i></div>
                            <h5 class="fw-bold">UMKM Kreatif</h5>
                            <p class="small text-muted mb-0">Kerajinan bambu dan olahan makanan ringan khas.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card h-100 p-4 border-0 shadow-sm bg-light card-hover-effect">
                            <div class="mb-3 text-success"><i class="bi bi-water display-4"></i></div>
                            <h5 class="fw-bold">Wisata Alam</h5>
                            <p class="small text-muted mb-0">Pesona curug dan pemandangan persawahan.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card h-100 p-4 border-0 shadow-sm bg-light card-hover-effect">
                            <div class="mb-3 text-success"><i class="bi bi-people-fill display-4"></i></div>
                            <h5 class="fw-bold">SDM Unggul</h5>
                            <p class="small text-muted mb-0">Masyarakat guyub dan inovatif.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    @include('partials._footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>