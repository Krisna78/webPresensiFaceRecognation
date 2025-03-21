<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    protected $fillable = [
        'hari',
        'jam_mulai',
        'jam_selesai',
        'id_kelas'
    ];
}
