<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     **/
    protected $fillable = ['name', 'country_id', 'clubs', 'rating', 'position_main', 'position_sub', 'goals', 'redcards', 'yellowcards'];

    /**
     * A player belongs to a country
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * @author Rajat Srivastava
     **/
    public function country() {
    	return $this->belongsTo('App\Country');
    }

    /**
     * Get the positions associated with given player
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function positions() {
        return $this->belongsToMany('App\Position');
    }

    /**
     * Get a list of position ids associated with the current player
     *
     * @return array
     **/
    public function getPositionListAttribute() {
        return $this->positions->lists('id');
    }
}
