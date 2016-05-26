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
Route::get('/', 'StartController@index1');
Route::get('/home','StartController@index');
Route::get('/ministerios','StartController@ministerios');
Route::get('ministerios/{nombre}','StartController@ministerioInfo');
Route::get('/online','StartController@online');
Route::get('online/{nombre}','StartController@servicioOnline');
Route::get('/contactenos','StartController@contactos');
Route::get('/noticias','StartController@noticias');
Route::get('/noticias/{id}','StartController@noticiaInfo');
Route::get('/acerca','StartController@acerca');
Route::post('/ContactoEnviar','StartController@enviar');
Route::get('online/Certificados/search','StartController@buscarCertificados');
Route::get('online/Certificados/RegistrosB_PDF/{numero}','PdfController@certificadoBautismal');
Route::get('online/Certificados/RegistrosM_PDF/{numero}','PdfController@certificadoMatrimonial');
Route::get('online/Reservas/Horario','StartController@horario');
Route::post('online/Reservas/nueva','StartController@nuevaReserva');


/*----------------*/
/*AdminPage Routes*/
/*----------------*/
Route::get('adminpage', 'HomeController@index');
Route::get('adminpage/Inicio', 'HomeController@inicio');
Route::get('adminpage/ArchivoParroquial','crud_controllers\ArchivoParroquialController@index');
Route::get('adminpage/SalaOracion','crud_controllers\SalaOracionController@index');

/*La Parroquia Routes*/
Route::resource('adminpage/Ministerios','crud_controllers\MinisterioController');
Route::resource('adminpage/Acerca','crud_controllers\AcercaController');
Route::resource('adminpage/Boletin','crud_controllers\BoletinController');

/*Archivo Parroquial Routes*/
Route::resource('adminpage/ArchivoParroquial/RegistrosBautismales','crud_controllers\RegistroBautismalController');
Route::resource('adminpage/ArchivoParroquial/RegistrosMatrimoniales','crud_controllers\RegistroMatrimonialController');
Route::get('adminpage/RegistrosB_Name','crud_controllers\RegistroBautismalController@findName');
Route::get('adminpage/RegistrosB_Date','crud_controllers\RegistroBautismalController@findDate');
Route::get('adminpage/RegistrosB_Row','crud_controllers\RegistroBautismalController@findRow');
Route::resource('adminpage/RegistrosM','crud_controllers\RegistroMatrimonialController');
Route::get('adminpage/RegistrosM_Name','crud_controllers\RegistroMatrimonialController@findName');
Route::get('adminpage/RegistrosM_Date','crud_controllers\RegistroMatrimonialController@findDate');
Route::get('adminpage/RegistrosM_Row','crud_controllers\RegistroMatrimonialController@findRow');
Route::get('adminpage/ArchivoParroquial/RegistrosB_PDF/{numero}','PdfController@certificadoBautismal');
Route::get('adminpage/ArchivoParroquial/RegistrosM_PDF/{numero}','PdfController@certificadoMatrimonial');

/*Sala de Oracion Routes*/
Route::get('adminpage/SalaOracion/Horario','crud_controllers\SalaOracionController@horario');
Route::get('adminpage/SalaOracion/Disponibilidad','crud_controllers\SalaOracionController@disponibilidad');
Route::post('adminpage/SalaOracion/Disponibilidad/save', 'crud_controllers\SalaOracionController@save');
Route::resource('adminpage/SalaOracion/Reservas', 'crud_controllers\ReservaController');

/*Usuarios Routes*/
Route::resource('adminpage/Usuarios', 'crud_controllers\UserController');

/*Auth Routes*/
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

