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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            // Ini adalah penghubungnya!
            $table->foreignId('umkm_id')->constrained('umkms')->onDelete('cascade');

            $table->string('nama_produk');
            $table->string('slug')->unique();
            $table->longText('deskripsi');
            $table->integer('harga'); // Harga dalam Rupiah, tanpa koma
            $table->string('gambar_produk')->nullable();
            $table->string('kategori')->nullable(); // Contoh: Makanan, Kerajinan, Jasa
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
