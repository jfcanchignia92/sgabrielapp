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

/*--------------*/
/*WebSite Routes*/
/*--------------*/
//Route::get('/', 'StartController@index');
Route::get('/home','StartController@index');
Route::get('/ministerios','crud_controllers\MinisterioController@index1');
Route::get('ministerios/{nombre}','StartController@ministerioInfo');
Route::get('/online','StartController@online');
Route::get('/online/{nombre}','StartController@servicioOnline');
Route::get('/contactenos','StartController@contactos');
Route::get('/noticia','StartController@noticias');
Route::get('/acerca','StartController@acerca');


/*----------------*/
/*AdminPage Routes*/
/*----------------*/
Route::get('adminpage', 'HomeController@index');
Route::get('adminpage/Inicio', 'HomeController@inicio');
Route::get('adminpage/Certificados','HomeController@certificados');
Route::resource('adminpage/Ministerios','crud_controllers\MinisterioController');
Route::resource('adminpage/Certificados','crud_controllers\CertificadoController');
Route::resource('adminpage/RegistrosB','crud_controllers\RegistroBautismalController');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

