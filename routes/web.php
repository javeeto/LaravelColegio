<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('alumno/agregar','alumnoController@create');
Route::post('alumno/agregar','alumnoController@store');
Route::get('alumno/listar','alumnoController@index');
Route::resource('alumno','alumnoController');
Route::resource('genero','GeneroController');
Route::get('alumno/{id}/destroy',[
    'uses' => 'alumnoController@destroy',
    'as' => 'alumno.destroy'
]);
 
