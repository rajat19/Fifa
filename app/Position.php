<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     **/
    protected $fillable = ['main', 'sub'];

    /**
     * scope for goalkeepers
     *
     * @return void
     **/
    public function scopeGoalkeepers($query) {
        return $query->where('main', '=', 'GK');
    }

    /**
     * scope for defenders
     *
     * @return void
     **/
    public function scopeDefenders($query) {
        return $query->where('main', '=', 'DEF');
    }

    /**
     * scope for midfielders
     *
     * @return void
     **/
    public function scopeMidfielders($query) {
        return $query->where('main', '=', 'MID');
    }

    /**
     * scope for attackers
     *
     * @return void
     **/
    public function scopeAttackers($query) {
        return $query->where('main', '=', 'ATT');
    }

    /**
     * A position belongs to many players
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * @author Rajat Srivastava
     **/
    public function players() {
    	return $this->belongsToMany('App\Player');
    }
}
