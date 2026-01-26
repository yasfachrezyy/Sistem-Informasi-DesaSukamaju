<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('titik_pentings', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kategori'); // Cth: Pemerintahan, Ibadah, UMKM, Pendidikan
            $table->text('deskripsi')->nullable();
            $table->string('foto')->nullable();
            $table->string('latitude');
            $table->string('longitude');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('titik_pentings');
    }
};