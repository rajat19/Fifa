<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Country;
use App\Player;
use App\Position;
use App\Team;
use App\Http\Requests;

class AdminController extends Controller {

    public function __construct() {
    	$this->middleware('auth');
    	if(Auth::user() && Auth::user()->type != 0) {
    		return view('errors.503');
    	}
    }

    /**
     * View for adding a new player
     *
     * @return view
     **/
    public function addPlayer() {
    	$countryList = Country::all();
        $positionList = Position::all();
        $posMain = array(); $posSub = array();
        foreach($positionList as $pos) {
            $pm = $pos['main'];
            $ps = $pos['sub'];
            $posMain[] = $pm;
            $posSub['ALL'][] = $ps;
            $posSub[$pm][] = $ps;
        }
        $posMain = array_unique($posMain);
    	return view('admin.add_player', compact('countryList', 'posMain'));
    }

    /**
     * View for adding a new country
     *
     * @return view
     **/
    public function addCountry() {
        $countryList = Country::all();
        return view('admin.add_country', compact(''));
    }

    /**
     * Add new country
     *
     * @param Request $request
     * @return json
     **/
    public function createCountry(Request $request) {
        $country = $request->all()['fullname'];
        if($q = Country::create($request->all())) $response = $country.' added';
        else $response = $country.' not added';
        return response()->json($response);
    }

    /**
     * View for adding a new team
     *
     * @return view
     **/
    public function addTeam() {
        $countryList = Country::all();
        return view('admin.add_team', compact('countryList'));
    }

    /**
     * Add new team
     *
     * @param Request $request
     * @return json
     **/
    public function createTeam(Request $request) {
        $data = $request->all();
        $team = $data['fullname'];
        if(isset($data['captain']) && !empty($data['captain'])) {
            $captain_id = DB::table('players')->where('name', '=', $data['captain'])->get()['id'];
            $data[$captain_id] = $captain_id;
        }
        $q = Team::create($request->all());
        if($q) $response = $team.' added';
        else $response = $team.' not added';
        return response()->json($response);
    }
}
