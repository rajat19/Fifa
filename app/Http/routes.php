<?php

Route::auth();

/*Admin Links*/
Route::get('player/add', 'AdminController@addPlayer');
Route::post('player/create', 'AdminController@createPlayer');
Route::get('team/add', 'AdminController@addTeam');
Route::post('team/create', 'AdminController@createTeam');
Route::get('country/add', 'AdminController@addCountry');
Route::post('country/create', 'AdminController@createCountry');
Route::get('position/add', 'AdminController@addPosition');
Route::post('positon/create', 'AdminController@createPosition');
Route::get('player/edit/{player}', 'AdminController@editPlayer');
Route::post('player/update', 'AdminController@updatePlayer');
Route::get('team/edit/{team}', 'AdminController@editTeam');
Route::post('team/update', 'AdminController@updateTeam');

/*Scheduling the tournament matches*/
Route::get('schedule', 'AdminController@schedule');
Route::get('/home', 'HomeController@index');

/*Page Links*/
Route::get('/', 'PageController@index');
Route::get('players', 'PageController@viewPlayers');
Route::post('players', 'PageController@playersList');
Route::get('player/{player}', 'PageController@viewPlayer');
Route::get('getRole', 'PageController@getRoleByPosition');
Route::get('captains', 'PageController@captainsList');
Route::get('clubs', 'PageController@clubsList');
Route::get('teams', 'PageController@viewTeams');
Route::post('teams', 'PageController@teamsList');
Route::get('team/{team}', 'PageController@viewTeam');

