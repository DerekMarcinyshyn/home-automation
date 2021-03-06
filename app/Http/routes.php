<?php

Route::get('/', 'WelcomeController@index');

//Route::get('home', 'HomeController@index');
//
//Route::controllers([
//	'auth' => 'Auth\AuthController',
//	'password' => 'Auth\PasswordController',
//]);


// Philips Hue Lights
Route::get('api/lights/get-lights', 'PhilipsHueController@getLights');

Route::get('api/lights/turn-off-all-lights', 'PhilipsHueController@turnOffAllLights');

Route::get('api/lights/adjust/{id}/{brightness}', 'PhilipsHueController@adjustLight');
