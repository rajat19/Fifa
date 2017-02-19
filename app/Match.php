<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model {
	
	/**
	 * The attributes that are mass assignable
	 *
	 * @var array
	 **/
	protected $fillable = ['tournament_id', 'home_team', 'away_team', 'home_score', 'away_score', 'home_penalty', 'away_penalty'];

	/**
	 * A match belongs to a tournament
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 * @author 
	 **/
	public function tournament() {
		return $this->belongsTo('App\Tournament');
	}
}
