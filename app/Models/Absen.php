<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $fillable = [
        'waktu_absen',
        'status',
        'jenis_absen',
        'id_user',
        'id_jadwal'
    ];
}
