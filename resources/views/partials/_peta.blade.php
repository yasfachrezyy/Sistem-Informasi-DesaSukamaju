<div class="map-container shadow-sm rounded-4 overflow-hidden border">
    {{-- Cek apakah variabel $profil ada dan kolom iframe_peta tidak kosong --}}
    @if(isset($profil) && $profil->iframe_peta)
        <div class="ratio ratio-21x9">
            {!! $profil->iframe_peta !!}
        </div>
    @else
        {{-- Tampilan Fallback jika admin belum mengisi data peta --}}
        <div class="ratio ratio-21x9">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31686.46273387516!2d107.1369638560344!3d-6.913564507490629!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6850fa889c13c5%3A0x298a155138b01889!2sSukamaju%2C%20Kec.%20Cibeber%2C%20Kabupaten%20Cianjur%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1769923141266!5m2!1sid!2sid"
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    @endif
</div>

<style>
    /* Memastikan iframe peta mengikuti ukuran container */
    .map-container iframe {
        width: 100%;
        height: 100%;
    }
</style>