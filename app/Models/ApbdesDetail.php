<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ApbdesDetail extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Satu rincian APBDes dimiliki oleh satu data APBDes (tahunan).
     */
    public function apbdes(): BelongsTo
    {
        return $this->belongsTo(Apbdes::class);
    }
}
