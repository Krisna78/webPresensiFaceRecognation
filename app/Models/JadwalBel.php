<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalBel extends Model
{
    protected $fillable = [
        'hari',
        'jam',
        'keterangan',
    ];
}
