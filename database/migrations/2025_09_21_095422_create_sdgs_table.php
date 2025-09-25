<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sdgs', function (Blueprint $table) {
            $table->id();
            $table->year('tahun');
            $table->decimal('skor_total', 8, 4)->default(0);
            $table->decimal('desa_tanpa_kemiskinan', 8, 4)->default(0);
            $table->decimal('desa_tanpa_kelaparan', 8, 4)->default(0);
            $table->decimal('desa_sehat_sejahtera', 8, 4)->default(0);
            $table->decimal('pendidikan_desa_berkualitas', 8, 4)->default(0);
            $table->decimal('keterlibatan_perempuan_desa', 8, 4)->default(0);
            $table->decimal('desa_layak_air_bersih', 8, 4)->default(0);
            $table->decimal('desa_berenergi_bersih', 8, 4)->default(0);
            $table->decimal('pertumbuhan_ekonomi_merata', 8, 4)->default(0);
            $table->decimal('infrastruktur_inovasi', 8, 4)->default(0);
            $table->decimal('desa_tanpa_kesenjangan', 8, 4)->default(0);
            $table->decimal('kawasan_pemukiman_aman', 8, 4)->default(0);
            $table->decimal('konsumsi_produksi_sadar_lingkungan', 8, 4)->default(0);
            $table->decimal('desa_tanggap_perubahan_iklim', 8, 4)->default(0);
            $table->decimal('desa_peduli_lingkungan_laut', 8, 4)->default(0);
            $table->decimal('desa_peduli_lingkungan_darat', 8, 4)->default(0);
            $table->decimal('desa_damai_berkeadilan', 8, 4)->default(0);
            $table->decimal('kemitraan_pembangunan_desa', 8, 4)->default(0);
            $table->decimal('kelembagaan_desa_dinamis', 8, 4)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sdgs');
    }
};
