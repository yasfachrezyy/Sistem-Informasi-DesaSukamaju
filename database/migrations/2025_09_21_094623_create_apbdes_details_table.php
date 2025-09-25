<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('apbdes_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('apbdes_id')->constrained()->onDelete('cascade');
            $table->string('tipe'); // 'pendapatan', 'belanja', atau 'pembiayaan'
            $table->string('kategori'); // Contoh: 'Dana Desa', 'Belanja Pegawai'
            $table->bigInteger('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apbdes_details');
    }
};
