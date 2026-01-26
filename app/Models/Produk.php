<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;

    protected $guarded = []; // Izinkan mass assignment untuk semua field
    protected $table = 'produks';
    protected $primaryKey = 'id';
    /**
     * Get the umkm that owns the Produk
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function umkm(): BelongsTo
    {
        return $this->belongsTo(Umkm::class);
    }
}
