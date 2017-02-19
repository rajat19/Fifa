<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    /**
     * The attributes that are mass assignable
     *
     * @var array
     **/
    protected $fillable = ['name', 'total', 'winner', 'second', 'top_scorer'];

    /**
     * A tournament has many matches
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * @author Rajat Srivastava
     **/
    public function matches() {
    	return $this->hasMany('App\Match');
    }

    /**
     * A tournament has many tournament points
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * @author Rajat Srivastava
     **/
    public function tournamentpoints() {
        return $this->hasMany('App\TournamentPoints');
    }
}
