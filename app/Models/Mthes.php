<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mthes extends Model
{
    protected $fillable = [
        'competition',
        'matchDate',
        'stadium',
        'location',
        'team_one',
        'team_two',
        'matchStatus',
        'ScoreTeamOne',
        'ScoreTeamTwo',
        'referee',
    ]; 

    public function teams(): HasMany
    {
        return $this->hasMany(Team::class);
    }

    public function matchTeams():HasMany
    {
        return $this->hasMany(MatcheTeam::class);
    }

}
