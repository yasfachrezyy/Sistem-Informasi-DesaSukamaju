<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Website Resmi Desa Sukamaju</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Fonts (Poppins) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        :root {
            --primary-color: #008000; /* Warna hijau utama */
            --secondary-color: #0f5132; /* Warna hijau tua */
        }

        .navbar {
            background-color: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
        }

        .navbar-brand img {
            max-height: 40px;
        }

        .nav-link {
            font-weight: 500;
            color: #333;
        }

        .nav-link.active, .nav-link:hover {
            color: var(--primary-color);
        }

        .hero-carousel .carousel-item {
            height: 85vh;
            min-height: 400px;
            background-size: cover;
            background-position: center;
        }

        .hero-carousel .carousel-caption {
            background: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
            bottom: 10%;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
            font-weight: 600;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background-color: var(--primary-color);
            border-radius: 2px;
        }

        h3[id] {
            scroll-margin-top: 100px; 
        }

        .stat-card-admin {
            background-color: #fff;
            border-radius: 15px;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,.08);
            transition: transform 0.3s ease;
            border-top: 5px solid #008000; /* Blue accent color */
            height: 100%;
        }
        .stat-card-admin:hover {
            transform: translateY(-5px);
        }
        .stat-card-admin .stat-value {
            font-size: 2.5rem;
            font-weight: 700;
            color: #0f5132; /* Blue accent color */
            margin-bottom: 0.5rem;
        }
        .stat-card-admin .stat-title {
            font-size: 1.1rem;
            color: #6c757d;
        }

        .apb-item {
            border-left: 5px solid #008000;
            padding-left: 1.5rem;
        }
        .apb-item .apb-title {
            color: #6c757d;
            margin-bottom: 0.25rem;
        }
        .apb-item .apb-amount {
            font-weight: 700;
            font-size: 2.25rem;
            color: #212529;
        }

        .card-news, .card-official, .card-potential {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            border-radius: 15px;
            overflow: hidden;
        }

        .card-news:hover, .card-official:hover, .card-potential:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0,0,0,.15);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
        
        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: #fff;
        }


        .sambutan-img {
            max-width: 300px;
            border: 5px solid #fff;
            box-shadow: 0 5px 15px rgba(0,0,0,.1);
        }
        
        .potential-icon i {
            font-size: 3rem;
            color: var(--primary-color);
        }

        .footer {
            background-color: #212529;
            color: #f8f9fa;
        }
        .footer a {
            color: #adb5bd;
            text-decoration: none;
        }
        .footer a:hover {
            color: #fff;
        }

    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <!-- GANTI NAMA FILE GAMBAR -->
                <img src="{{ asset('images/logo-desa.png') }}" alt="Logo Desa Sukamaju">
                <strong class="ms-2">Desa Sukamaju</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- ================== BAGIAN MENU YANG DIPERBARUI ================== -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profil') }}">Profil Desa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('infografis.index') }}">Infografis</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href=#>Listing</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#berita">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=#>Belanja</a>
                    </li>
                </ul>
                <!-- ================== AKHIR BAGIAN MENU ================== -->

                <div class="ms-lg-3 mt-2 mt-lg-0">
                    <a href="/admin" class="btn btn-outline-primary">
                        <i class="bi bi-box-arrow-in-right"></i> Login Admin
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section Carousel -->
    <header id="hero-carousel" class="carousel slide hero-carousel" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <!-- GANTI NAMA FILE GAMBAR -->
            <div class="carousel-item active" style="background-image: url('{{ asset('images/kantor-desa.jpg') }}');">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Selamat Datang di Desa Sukamaju</h1>
                    <p>Membangun Bersama untuk Desa yang Maju, Mandiri, dan Sejahtera.</p>
                </div>
            </div>
            <!-- GANTI NAMA FILE GAMBAR -->
            <div class="carousel-item" style="background-image: url('{{ asset('images/hero-bg.jpg') }}');">
                <div class="carousel-caption d-none d-md-block">
                    <h2>Potensi Alam yang Indah</h2>
                    <p>Menjelajahi keindahan alam dan potensi agrowisata di Desa Sukamaju.</p>
                </div>
            </div>
            <!-- GANTI NAMA FILE GAMBAR -->
            <div class="carousel-item" style="background-image: url('{{ asset('images/phbn.jpg') }}');">
                <div class="carousel-caption d-none d-md-block">
                    <h2>Kegiatan Masyarakat</h2>
                    <p>Semangat gotong royong dan kebersamaan warga dalam setiap kegiatan desa.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </header>

    <main>
        <!-- Sambutan Kepala Desa -->
        <section id="sambutan" class="py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-center">
                        <!-- GANTI NAMA FILE GAMBAR -->
                        <img src="{{ asset('images/struktural/kades.jpg') }}" class="img-fluid rounded-circle sambutan-img" alt="Kepala Desa Sukamaju">
                    </div>
                    <div class="col-lg-8 mt-4 mt-lg-0">
                        <h2 class="fw-bold">Sambutan Kepala Desa</h2>
                        <h4 class="text-muted mb-3">Hendri, S.IP</h4>
                        <p>Assalamualaikum Wr. Wb.</p>
                        <p>Puji syukur kehadirat Allah SWT atas rahmat dan karunia-Nya sehingga website resmi Desa Sukamaju ini dapat kami hadirkan. Website ini merupakan wujud komitmen kami dalam memberikan transparansi informasi dan pelayanan publik yang lebih baik kepada seluruh masyarakat.</p>
                        <p>Kami berharap, melalui media ini, masyarakat dapat lebih mudah mengakses informasi seputar program desa, berita terkini, serta potensi yang ada di Desa Sukamaju. Mari bersama-sama kita bangun desa kita tercinta.</p>
                        <p>Wassalamualaikum Wr. Wb.</p>
                    </div>
                </div>
            </div>
        </section>

        @include('partials._jelajahi')
        @include('partials._peta')
        @include('partials._aparatur')
        @include('partials._administrasi')
        @include('partials._apb')

        <!-- Berita Terkini -->
        <section id="berita" class="py-5 bg-light">
            <div class="container">
                <h2 class="section-title">Berita Terkini</h2>
                <div class="row g-4">
                    <!-- Contoh Berita 1 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card card-news h-100">
                             <!-- GANTI NAMA FILE GAMBAR -->
                            <img src="{{ asset('images/berita-1.jpg') }}" class="card-img-top" alt="Berita 1">
                            <div class="card-body d-flex flex-column">
                                <div>
                                    <small class="text-muted">21 September 2025</small>
                                    <h5 class="card-title mt-2">Penyaluran Bantuan Langsung Tunai (BLT) Tahap III</h5>
                                    <p class="card-text">Pemerintah Desa Sukamaju telah berhasil menyalurkan BLT tahap ketiga kepada 150 keluarga penerima manfaat...</p>
                                </div>
                                <a href="#" class="btn btn-primary mt-auto">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <!-- Contoh Berita 2 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card card-news h-100">
                             <!-- GANTI NAMA FILE GAMBAR -->
                            <img src="{{ asset('images/berita-2.jpg') }}" class="card-img-top" alt="Berita 2">
                            <div class="card-body d-flex flex-column">
                                <div>
                                    <small class="text-muted">18 September 2025</small>
                                    <h5 class="card-title mt-2">Kerja Bakti Membersihkan Saluran Irigasi Desa</h5>
                                    <p class="card-text">Warga Dusun Cibeureum bergotong-royong membersihkan saluran irigasi untuk persiapan musim tanam mendatang...</p>
                                </div>
                                <a href="#" class="btn btn-primary mt-auto">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <!-- Contoh Berita 3 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card card-news h-100">
                            <!-- GANTI NAMA FILE GAMBAR -->
                            <img src="{{ asset('images/berita-3.jpg') }}" class="card-img-top" alt="Berita 3">
                            <div class="card-body d-flex flex-column">
                                <div>
                                    <small class="text-muted">15 September 2025</small>
                                    <h5 class="card-title mt-2">Pelatihan UMKM: Peningkatan Kualitas Produk Lokal</h5>
                                    <p class="card-text">Dinas Koperasi dan UMKM mengadakan pelatihan bagi para pelaku usaha mikro di balai desa Sukamaju...</p>
                                </div>
                                <a href="#" class="btn btn-primary mt-auto">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Potensi Desa -->
        <section id="potensi" class="py-5">
            <div class="container">
                <h2 class="section-title">Potensi Desa</h2>
                <div class="row g-4 text-center">
                    <div class="col-md-6 col-lg-3">
                        <div class="card card-potential p-4 h-100">
                            <div class="potential-icon mb-3"><i class="bi bi-tree-fill"></i></div>
                            <h4 class="fw-bold">Pertanian</h4>
                            <p>Lahan sawah yang subur menjadi andalan utama dengan komoditas padi, jagung, dan palawija.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card card-potential p-4 h-100">
                            <div class="potential-icon mb-3"><i class="bi bi-piggy-bank-fill"></i></div>
                            <h4 class="fw-bold">Peternakan</h4>
                            <p>Peternakan sapi potong dan ayam kampung yang dikelola oleh kelompok ternak warga.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card card-potential p-4 h-100">
                            <div class="potential-icon mb-3"><i class="bi bi-shop"></i></div>
                            <h4 class="fw-bold">UMKM</h4>
                            <p>Produk unggulan seperti keripik singkong, gula aren, dan kerajinan tangan dari bambu.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card card-potential p-4 h-100">
                            <div class="potential-icon mb-3"><i class="bi bi-geo-alt-fill"></i></div>
                            <h4 class="fw-bold">Pariwisata</h4>
                            <p>Potensi wisata alam curug (air terjun) dan area perkemahan yang masih asri dan alami.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    
    <!-- Footer -->
    <footer class="footer pt-5 pb-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5 class="mb-3 fw-bold">Desa Sukamaju</h5>
                    <p>Mewujudkan desa yang adil, makmur, dan sejahtera melalui pembangunan yang partisipatif dan berkelanjutan.</p>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5 class="mb-3 fw-bold">Tautan</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Profil Desa</a></li>
                        <li><a href="#">Berita</a></li>
                        <li><a href="#">Galeri</a></li>
                        <li><a href="#">Kontak Kami</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="mb-3 fw-bold">Kontak</h5>
                    <p><i class="bi bi-geo-alt-fill me-2"></i>Jl. Raya Sukamaju No. 1, Kec. Cibeber, Kab. Cianjur, Jawa Barat 43262</p>
                    <p><i class="bi bi-telephone-fill me-2"></i>(0263) 123-456</p>
                    <p><i class="bi bi-envelope-fill me-2"></i>kontak@sukamaju.desa.id</p>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                     <h5 class="mb-3 fw-bold">Lokasi Kami</h5>
                     <!-- GANTI SRC DENGAN EMBED GOOGLE MAPS DESA ANDA -->
                     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15843.95761560737!2d107.08643869999999!3d-6.8918239!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6857e84166c3c7%3A0x6b4c304d3d789e92!2sSukamaju%2C%2C%20Cianjur%20Regency%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1663742813589!5m2!1sen!2sid" width="100%" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <hr>
            <div class="row text-center">
                <p>&copy; 2025 Hak Cipta Dilindungi - Pemerintah Desa Sukamaju</p>
            </div>
        </div>
    </footer>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

