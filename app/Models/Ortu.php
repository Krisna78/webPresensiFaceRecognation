<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
    protected $with = [];
    
    public function users(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
