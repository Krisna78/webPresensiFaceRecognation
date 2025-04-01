<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Presensi extends Model
{
    protected $fillable = [
        'hari',
        'jam_mulai',
        'jam_selesai',
        'id_kelas'
    ];
    protected $with = [];

    public function kelas(): HasMany {
        return $this->hasMany(Kelas::class);
    }
    public function detailPresensi():BelongsTo {
        return $this->belongsTo(DetailPresensi::class);
    }
}
