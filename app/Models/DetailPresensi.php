<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPresensi extends Model
{
    protected $fillable = [
        'waktu_presensi',
        'kehadiran',
        'kepulangan',
        'id_user',
        'id_jadwal'
    ];
}
