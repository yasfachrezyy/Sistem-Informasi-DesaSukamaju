<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaBansos extends Model
{
    use HasFactory;

    // Nama tabelnya kita definisikan secara eksplisit agar sesuai dengan migrasi
    protected $table = 'penerima_bansos';

    protected $guarded = [];
}
