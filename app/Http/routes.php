<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware' => ['web']], function () {
  Route::get('/', function () {
      return view('welcome');
  });
  Route::controller('plataforma', 'PlataformaController');
  Route::controller('hora', 'HoraController');
  Route::controller('especialidad', 'EspecialidadController');
  Route::controller('administrador', 'AdministradorController');
  Route::controller('profesional', 'ProfesionalController');
  Route::controller('paciente', 'PacienteController');
  Route::controller('mensaje', 'MensajeController');
  Route::controller('sitio', 'SitioController');
});
