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

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

Route::resource('Calificaciones','CalificacionController');

Route::resource('CalificacionesPregunta','CalificacionPreguntaController');

Route::get('/listarPreguntas/{idAsignatura}', 'CalificacionPreguntaController@searchByPreguntas');

Route::get('/autocompleteEstudiante/findEstudiante', 'AutocompleteControllerEstudiante@findEstudiante');

Route::get('/reportPregunta', 'CalificacionPreguntaController@report');
Route::post('showPregunta', 'CalificacionPreguntaController@show');

Route::get('/report', 'CalificacionController@report');
Route::post('show', 'CalificacionController@show');

Route::get('/reporte', function () {
    return view('c_preguntas.show');
});
    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
