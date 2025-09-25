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
        Schema::create('demografi_details', function (Blueprint $table) {
            $table->id();
            $table->year('tahun');
            $table->string('tipe'); // Contoh: 'umur', 'pendidikan', 'pekerjaan'
            $table->string('kategori'); // Contoh: '0-5 Tahun', 'SD/MI', 'Petani'
            $table->integer('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demografi_details');
    }
};
