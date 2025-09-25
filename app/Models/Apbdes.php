<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Apbdes extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Satu data APBDes (tahunan) memiliki banyak rincian.
     */
    public function details(): HasMany
    {
        return $this->hasMany(ApbdesDetail::class);
    }
}
