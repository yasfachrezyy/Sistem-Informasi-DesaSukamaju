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
        Schema::create('penerima_bansos', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique(); // NIK harus unik
            $table->string('nama');
            $table->text('alamat');
            // Kita bisa menambahkan kolom tahun dan jenis bansos di sini jika satu orang bisa menerima lebih dari satu jenis bantuan
            // Namun untuk awal, kita buat sederhana dulu.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerima_bansos');
    }
};
