<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TournamentPoint extends Model
{
    /**
     * The attributes that are mass assignable
     *
     * @var array
     **/
    protected $fillable = ['tournament_id', 'team_id', 'points', 'status'];

    /**
     * A tournamentpoint belongs to a tournament
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * @author Rajat Srivastava
     **/
    public function tournament() {
    	return $this->belongsTo('App\Tournament');
    }

    /**
     * A tournamentpoint belongs to a team
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * @author Rajat Srivastava
     **/
    public function team() {
    	return $this->belongsTo('App\Team');
    }
}
