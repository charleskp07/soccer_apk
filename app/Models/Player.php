<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Player extends Model
{
    protected $fillable = [   
        'team_id', 
        'passport_photo',
        'lastname',
        'firstname',
        'age',
        'weight',
        'size',
        'country_of_origin',
    ];

    public function team(): BelongsTo 
    {
        return $this->belongsTo(Team::class);
    }
}
