<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kelas extends Model
{
    protected $fillable = [
        'nama_kelas'
    ];
    protected $with = [];
    public function presensi(): BelongsTo {
        return $this->belongsTo(Presensi::class);
    }
}
