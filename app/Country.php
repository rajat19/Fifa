<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * The attributes that are mass assignable
     *
     * @var array
     **/
    protected $fillable = ['fullname', 'shortname'];

    /**
     * the different country scope
     *
     * @return query
     **/
    public function scopeBrazzers($query, $country_id) {
        return $query->where('country_id', '!=', $country_id);
    }

    /**
     * A country has many players
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * @author Rajat Srivastava
     **/
    public function players() {
    	return $this->hasMany('App\Player');
    }

    /**
     * A country has many teams
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * @author Rajat Srivastava
     **/
    public function teams() {
    	return $this->hasMany('App\Team');
    }
}
