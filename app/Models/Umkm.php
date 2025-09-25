<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Umkm extends Model
{
        use HasFactory;

    protected $guarded = []; // Izinkan mass assignment untuk semua field

    /**
     * Get all of the produks for the Umkm
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function produks(): HasMany
    {
        return $this->hasMany(Produk::class);
    }

    // app/Models/Umkm.php

    /**
     * Membuat accessor untuk link WhatsApp yang sudah diformat.
     *
     * @return string
     */
    public function getLinkWhatsAppAttribute(): string
    {
        // 1. Ambil nomor dari database
        $nomor = $this->nomor_whatsapp;

        // 2. Hapus karakter selain angka (spasi, -, +)
        $nomor = preg_replace('/[^0-9]/', '', $nomor);

        // 3. Jika nomor diawali '0', ganti dengan '62'
        if (substr($nomor, 0, 1) === '0') {
            $nomor = '62' . substr($nomor, 1);
        }

        // 4. Jika nomor belum diawali '62', tambahkan
        if (substr($nomor, 0, 2) !== '62') {
            $nomor = '62' . $nomor;
        }

        // 5. Buat pesan default (opsional)
        $pesan = rawurlencode("Halo, saya tertarik dengan produk dari UMKM Anda.");

        return "https://wa.me/{$nomor}?text={$pesan}";
    }
}
