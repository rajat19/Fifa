<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /**
     * The attributes that are mass assignable
     *
     * @var array
     **/
    protected $fillable = ['fullname', 'shortname', 'country_id', 'captain_id', 'won', 'loss', 'draw'];

    /**
     * A team belongs to a country
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * @author Rajat Srivastava
     **/
    public function country() {
    	return $this->belongsTo('App\Country');
    }

    /**
     * A team has a captain
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     * @author Rajat Srivastava
     **/
    public function captain() {
    	return $this->hasOne('App\Player');
    }

    /**
     * A team has many tournament points
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * @author Rajat Srivastava
     **/
    public function tournamentpoints() {
        return $this->hasMany('App\TournamentPoints');
    }
}
