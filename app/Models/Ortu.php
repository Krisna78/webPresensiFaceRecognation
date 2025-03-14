<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ortu extends Model
{
    protected $fillable = [
        'nama',
        'username',
        'no_hp',
        'password',
    ];
    protected $hidden = [
        'password',
    ];
}
