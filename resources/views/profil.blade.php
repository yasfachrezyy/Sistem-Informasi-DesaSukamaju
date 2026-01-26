<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Desa - Website Resmi Desa Sukamaju</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Fonts (Poppins) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom CSS (Sama seperti welcome.blade.php) -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        :root {
            --primary-color: #008000;
            --secondary-color: #0f5132;
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

        h3[id] {
           scroll-margin-top: 100px; 
        }

        .page-header {
            padding-top: 120px; /* Jarak dari atas (setelah navbar) */
            padding-bottom: 60px;
            background-color: #e9ecef;
        }

        .misi-list {
            padding-left: 0;
            list-style: none;
            counter-reset: misi-counter;
        }
        .misi-list li {
            counter-increment: misi-counter;
            margin-bottom: 1rem;
            display: flex;
            align-items: flex-start;
            line-height: 1.6;
        }
        .misi-list li::before {
            content: counter(misi-counter);
            background-color: var(--primary-color);
            color: white;
            font-weight: bold;
            border-radius: 50%;
            width: 28px;
            height: 28px;
            min-width: 28px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            font-size: 0.9rem;
        }
        
        .card-struktur {
            border: none;
            border-radius: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color: #fff;
            /* padding-top: 60px; Dihapus dari sini */
            margin-top: 60px;
        }
        .card-struktur:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,.15);
        }
        .card-struktur .card-img-top {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            position: absolute;
            top: -60px;
            left: 50%;
            transform: translateX(-50%);
            border: 5px solid #fff;
            background-color: #f8f9fa;
            box-shadow: 0 4px 10px rgba(0,0,0,.1);
        }
        .card-struktur .card-body {
            padding-top: 70px; /* Jarak ditambahkan di sini */
        }
        .jabatan-kades {
            color: #dc3545;
        }
        .jabatan-lain {
            color: #6c757d;
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
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/logo-desa.png') }}" alt="Logo Desa Sukamaju">
                <strong class="ms-2">Desa Sukamaju</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/profil">Profil Desa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/infografis">Infografis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/listing">Listing</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="/#berita">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/belanja">Belanja</a>
                    </li>
                </ul>
                <div class="ms-lg-3 mt-2 mt-lg-0">
                    <a href="/admin" class="btn btn-outline-primary">
                        <i class="bi bi-box-arrow-in-right"></i> Login Admin
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main>
        <!-- Page Header -->
        <div class="page-header">
            <div class="container text-center">
                <h1 class="display-4 fw-bold">Profil Desa Sukamaju</h1>
                <p class="lead text-muted">Mengenal lebih dekat tentang Sejarah, Visi & Misi, serta Pemerintahan Desa.</p>
            </div>
        </div>

        <!-- Memanggil Partial Konten Profil -->
        @include('partials._profil')
    </main>
    
    <!-- Footer -->
    <footer id="kontak" class="footer pt-5 pb-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5 class="mb-3 fw-bold">Desa Sukamaju</h5>
                    <p>Mewujudkan desa yang adil, makmur, dan sejahtera melalui pembangunan yang partisipatif dan berkelanjutan.</p>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5 class="mb-3 fw-bold">Tautan</h5>
                    <ul class="list-unstyled">
                        <li><a href="/profil">Profil Desa</a></li>
                        <li><a href="/#berita">Berita</a></li>
                        <li><a href="#">Galeri</a></li>
                        <li><a href="#kontak">Kontak Kami</a></li>
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
                     <iframe src="https://www.google.com/maps/embed?pb=!1m18!m12!1m3!1d15843.95761560737!2d107.08643869999999!3d-6.8918239!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6857e84166c3c7%3A0x6b4c304d3d789e92!2sSukamaju%2C%2C%20Cianjur%20Regency%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1663742813589!5m2!1sen!2sid" width="100%" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
