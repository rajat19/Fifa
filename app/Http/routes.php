<?php

Route::auth();

/*Page Links*/
Route::get('/', 'PageController@index');
Route::get('players', 'PageController@viewPlayers');
Route::post('players', 'PageController@playersList');
Route::get('player/{player}', 'PageController@viewPlayer');
Route::get('getRole', 'PageController@getRoleByPosition');
Route::get('teams', 'PageController@viewTeams');
Route::post('teams', 'PageController@teamsList');
Route::get('team/{team}', 'PageController@viewTeam');

/*Admin Links*/
Route::get('admin/edit/player/{player}', 'AdminController@editPlayer');
Route::post('admin/update/player/{player}', 'AdminController@updatePlayer');
Route::get('admin/edit/team/{team}', 'AdminController@editTeam');
Route::post('admin/update/team/{team}', 'AdminController@updateTeam');
Route::get('admin/add/player', 'AdminController@addPlayer');
Route::post('admin/create/player', 'AdminController@createPlayer');
Route::get('admin/add/team', 'AdminController@addTeam');
Route::post('admin/create/team', 'AdminController@createTeam');
Route::get('admin/add/country', 'AdminController@addCountry');
Route::post('admin/create/country', 'AdminController@createCountry');
Route::get('admin/add/position', 'AdminController@addPosition');
Route::post('admin/create/positon', 'AdminController@createPosition');

/*Scheduling the tournament matches*/
Route::get('admin/schedule', 'AdminController@schedule');
Route::get('/home', 'HomeController@index');
