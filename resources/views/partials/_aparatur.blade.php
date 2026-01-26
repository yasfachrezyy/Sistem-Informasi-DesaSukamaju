<section id="sotk" class="py-5 bg-light">
    <div class="container">
        <div class="mb-5">
            <h2 class="fw-bold">SOTK</h2>
            <p class="text-muted">Struktur Organisasi Pemerintah Desa</p>
        </div>
        <div class="row g-4">
            <!-- Kepala Desa -->
            <div class="col-lg-3 col-md-6">
                <div class="card card-sotk text-center h-100">
                    <img src="{{ asset('images/struktural/kades.jpg') }}" class="card-img-top" alt="Kepala Desa">
                    <div class="card-footer">
                        <h6 class="mb-0 fw-bold">Hendri, S.IP</h6>
                        <small class="text-white-50">Kepala Desa</small>
                    </div>
                </div>
            </div>
            <!-- Sekretaris Desa -->
            <div class="col-lg-3 col-md-6">
                <div class="card card-sotk text-center h-100">
                    <img src="{{ asset('images/struktural/sekdes.jpg') }}" class="card-img-top" alt="Sekretaris Desa">
                    <div class="card-footer">
                        <h6 class="mb-0 fw-bold">Sesep Abdullah, S.IP</h6>
                        <small class="text-white-50">Sekretaris Desa</small>
                    </div>
                </div>
            </div>
            <!-- Kaur Keuangan -->
            <div class="col-lg-3 col-md-6">
                <div class="card card-sotk text-center h-100">
                    <img src="{{ asset('images/struktural/kaur-keuangan.jpg') }}" class="card-img-top" alt="Kaur Keuangan">
                    <div class="card-footer">
                        <h6 class="mb-0 fw-bold">Mela Susi</h6>
                        <small class="text-white-50">Kaur Keuangan</small>
                    </div>
                </div>
            </div>
            <!-- Kaur TU & Umum -->
            <div class="col-lg-3 col-md-6">
                <div class="card card-sotk text-center h-100">
                    <img src="{{ asset('images/struktural/kaur-tu.jpg') }}" class="card-img-top" alt="Kaur TU & Umum">
                    <div class="card-footer">
                        <h6 class="mb-0 fw-bold">Ayu Wandira</h6>
                        <small class="text-white-50">Kaur TU & Umum</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-end mt-4">
            <a href="{{ route('profil') }}#struktur-organisasi" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-diagram-3 me-2"></i>Lihat Struktur Lebih Lengkap
            </a>
        </div>
    </div>
</section>
