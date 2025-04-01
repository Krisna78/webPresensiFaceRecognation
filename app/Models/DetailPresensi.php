<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DetailPresensi extends Model
{
    protected $fillable = [
        'waktu_presensi',
        'kehadiran',
        'kepulangan',
        'id_user',
        'id_presensi'
    ];
    protected $with = ['user','presensi'];
    public function user(): HasMany {
        return $this->hasMany(User::class);
    }
    public function presensi(): HasMany {
        return $this->hasMany(Presensi::class);
    }
}
