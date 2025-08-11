<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    protected $fillable = [        
        'team_badge',
        'name',
        'creation_date',
        'effectif',
    ];

    public function players(): HasMany
    {
        return $this->hasMany(Player::class);
    }

    public function matchs(): BelongsTo
    {
        return $this->belongsTo(Mthes::class);
    }

    public function matchTeams():HasMany
    {
        return $this->hasMany(MatcheTeam::class);
    }
  
}
