<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', 'StartController@index');
Route::get('/home','StartController@index');
Route::get('/ministerios','StartController@ministerios');
Route::get('/online','StartController@online');
Route::get('/online/{nombre}','StartController@servicioOnline');
Route::get('/contactenos','StartController@contactos');
Route::get('/noticia','StartController@noticias');
Route::get('/acerca','StartController@acerca');
Route::get('ministerios/{nombre}','StartController@ministerioInfo');
Route::get('adminpage', 'HomeController@index');
Route::get('adminpage/Ministerios','HomeController@ministerios');
Route::get('adminpage/Certificados','HomeController@certificados');
Route::resource('ministerios','crud_controllers\MinisterioController');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

