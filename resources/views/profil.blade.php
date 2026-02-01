@extends('layouts.app')

@section('title', 'Profil Desa ' . ($profil->nama_desa ?? 'Sukamaju'))

@section('content')

<style>
    /* Header Gradasi */
    .page-header {
        background: linear-gradient(135deg, #198754 0%, #20c997 100%);
        padding: 4rem 0 3rem;
        margin-bottom: 3rem;
        color: white;
        border-radius: 0 0 50px 50px;
    }

    /* Sticky Sidebar Navigation */
    .sticky-nav {
        position: sticky;
        top: 100px;
        z-index: 10;
    }
    
    .nav-pills .nav-link {
        color: #555;
        background-color: white;
        border: 1px solid #e9ecef;
        margin-bottom: 0.5rem;
        border-radius: 50px;
        padding: 0.75rem 1.5rem;
        font-weight: 500;
        transition: all 0.3s;
        text-align: left;
    }
    
    .nav-pills .nav-link:hover {
        background-color: #f8f9fa;
        transform: translateX(5px);
    }
    
    .nav-pills .nav-link.active {
        background-color: #198754;
        color: white;
        border-color: #198754;
        box-shadow: 0 4px 6px rgba(25, 135, 84, 0.3);
    }

    /* Smooth Scroll Offset (agar tidak tertutup navbar) */
    html {
        scroll-behavior: smooth;
    }
    section {
        scroll-margin-top: 100px;
    }
</style>

{{-- 1. Header Section --}}
<div class="page-header text-center">
    <div class="container">
        <h1 class="fw-bold display-5 mb-2">Profil Desa {{ $profil->nama_desa ?? 'Sukamaju' }}</h1>
        <p class="lead opacity-75">Mengenal lebih dekat sejarah, visi misi, dan struktur pemerintahan desa kami.</p>
        
        <nav aria-label="breadcrumb" class="d-flex justify-content-center mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="text-white text-decoration-none fw-bold">Beranda</a></li>
                <li class="breadcrumb-item active text-white opacity-75" aria-current="page">Profil Desa</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container mb-5">
    <div class="row g-5">
        
        {{-- 2. Sidebar Navigasi (Desktop Only) --}}
        <div class="col-lg-3 d-none d-lg-block">
            <div class="sticky-nav">
                <h6 class="text-uppercase text-muted fw-bold mb-3 ls-1 small">Daftar Isi</h6>
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link" href="#tentang-desa">
                        <i class="bi bi-info-circle me-2"></i> Tentang Desa
                    </a>
                    <a class="nav-link" href="#visi-misi">
                        <i class="bi bi-bullseye me-2"></i> Visi & Misi
                    </a>
                    <a class="nav-link" href="#pemerintahan">
                        <i class="bi bi-people-fill me-2"></i> Pemerintahan
                    </a>
                    <a class="nav-link" href="#peta-wilayah">
                        <i class="bi bi-map-fill me-2"></i> Peta Wilayah
                    </a>
                </div>

                {{-- Widget Kontak Kecil --}}
                <div class="card border-0 bg-light rounded-4 mt-4 p-3">
                    <h6 class="fw-bold mb-2">Butuh Bantuan?</h6>
                    <p class="small text-muted mb-3">Hubungi layanan pengaduan atau informasi desa.</p>
                    <a href="#" class="btn btn-outline-success btn-sm rounded-pill w-100 fw-bold">Hubungi Kami</a>
                </div>
            </div>
        </div>

        {{-- 3. Konten Utama --}}
        <div class="col-lg-9">
            
            {{-- Bagian A: Tentang & Visi Misi (Load dari partial _profil) --}}
            {{-- Pastikan di dalam _profil.blade.php Anda menggunakan ID section yang sesuai atau biarkan wrapper ini yang mengaturnya --}}
            
            <section id="tentang-desa" class="mb-5">
                <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">
                    @include('partials._profil', ['profil' => $profil])
                </div>
            </section>

            {{-- Bagian B: Aparatur Desa --}}
            <section id="pemerintahan" class="mb-5">
                <div class="d-flex align-items-center mb-4">
                    <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                        <i class="bi bi-diagram-3-fill fs-4"></i>
                    </div>
                    <div>
                        <h3 class="fw-bold mb-0 text-dark">Struktur Pemerintahan</h3>
                        <p class="text-muted mb-0">Aparatur Desa {{ $profil->nama_desa ?? 'Sukamaju' }}</p>
                    </div>
                </div>

                @include('partials._aparatur', ['aparaturs' => $aparaturs])
            </section>

            {{-- Bagian C: Peta Wilayah (Opsional / Placeholder jika belum ada partial peta) --}}
            <section id="peta-wilayah" class="mb-5">
                <div class="d-flex align-items-center mb-4">
                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                        <i class="bi bi-geo-alt-fill fs-4"></i>
                    </div>
                    <div>
                        <h3 class="fw-bold mb-0 text-dark">Lokasi Desa</h3>
                        <p class="text-muted mb-0">Peta Wilayah Administratif</p>
                    </div>
                </div>
                
                {{-- Jika Anda punya partial peta, include di sini --}}
                @include('partials._peta') 
            </section>

        </div>
    </div>
</div>

{{-- Script untuk Navigasi Aktif saat Scroll (ScrollSpy Sederhana) --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sections = document.querySelectorAll("section");
        const navLi = document.querySelectorAll(".sticky-nav .nav-link");

        window.onscroll = () => {
            var current = "";

            sections.forEach((section) => {
                const sectionTop = section.offsetTop;
                if (pageYOffset >= sectionTop - 150) {
                    current = section.getAttribute("id");
                }
            });

            navLi.forEach((li) => {
                li.classList.remove("active");
                if (li.getAttribute("href").includes(current)) {
                    li.classList.add("active");
                }
            });
        };
    });
</script>

@endsection