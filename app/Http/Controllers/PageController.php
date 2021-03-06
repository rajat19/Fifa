<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\Country;
use App\Player;
use App\Position;
use App\Team;

class PageController extends Controller{
	
	/**
	 * Home page
	 *
	 * @return view
	 **/
	public function index() {
		if(Auth::guest())
    		return view('pages.index');
    	else {
    		$type = Auth::user()->type;
    		if($type == '0')
    			return view('admin.index');
    		else return view('errors.503');
    	}
	}

	/**
	 * Set parameters for selecting players
	 *
	 * @return view
	 **/
	public function viewPlayers() {
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
		return view('pages.view_players', compact('countryList', 'posMain', 'posSub'));
	}

	/**
	 * return list of captains
	 *
	 * @return json
	 **/
	public function captainsList() {
		// $captains = Player::all();
		// foreach($captains as $captain) {
		// 	$arr[] = array($captain['id'], $captain['name']);
		// }
		// $arr[] = array('id'=>0, 'name'=>'Sergio Ramos');
		// $arr[] = array('id'=>1, 'name'=>'Carlos Puyol');
		$arr = array('Sergio Ramos', 'Carlos Puyol');
		return response()->json($arr);
	}

	/**
	 * return list of clubs
	 *
	 * @return json
	 **/
	public function clubsList() {
		$teams = Team::all();
		$arr = array();
		foreach($teams as $team) {
			$arr[] = $team['fullname'];
		}
		return response()->json($arr);
	}

	/**
	 * return list of roles for a particular position
	 *
	 * @param main position
	 * @return json
	 **/
	public function getRoleByPosition(Request $request) {
		$main = $request->all()['main'];
		switch($main) {
			case 'ALL':
				$sub = Position::all();
				break;
			case 'GK':
				$sub = Position::goalkeepers()->get();
				break;
			case 'DEF':
				$sub = Position::defenders()->get();
				break;
			case 'MID':
				$sub = Position::midfielders()->get();
				break;
			case 'ATT':
				$sub = Position::attackers()->get();
				break;
		}
		foreach($sub as $x) {
			$response[] = $x['sub'];
		}
		return response()->json($response);
	}

	/**
	 * Display list based on set parameters
	 *
	 * @param Request request
	 * @return view
	 **/
	public function playersList(Request $request) {
		$parameters = $request->all();
		dd($parameters);
	}

	/**
	 * Display detail of a particular player
	 *
	 * @param Player player 	 
	 * @return view
	 **/
	public function viewPlayer(Player $player) {
		$data = $player->get()[0];
		return view('pages.players', compact('data'));
	}
}
