<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MatcheTeam extends Model
{
    protected $fillable = [   
        'team_id', 
        'mtche_id'
    ];

    public function matchs(): BelongsTo
    {
        return $this->belongsTo(Mthes::class);
    }

    public function teams(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
    
}
