<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('images/logo-desa.png') }}" alt="Logo">
            <strong class="ms-2">Desa Sukamaju</strong>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('profil') ? 'active' : '' }}" href="{{ route('profil') }}">Profil Desa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('infografis.*') ? 'active' : '' }}" href="{{ route('infografis.index') }}">Infografis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('berita.*') ? 'active' : '' }}" href="{{ route('berita.index') }}">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('belanja.*') ? 'active' : '' }}" href="{{ route('belanja.umkm') }}">Belanja</a>
                </li>
            </ul>
            <div class="ms-lg-3 mt-2 mt-lg-0">
                <a href="/admin" class="btn btn-outline-primary btn-sm">
                    <i class="bi bi-box-arrow-in-right"></i> Login Admin
                </a>
            </div>
        </div>
    </div>
</nav>