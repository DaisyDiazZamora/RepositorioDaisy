<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('casilla', 'CasillaController');
Route::resource('candidato', 'Api\CandidatoController');
Route::resource('funcionario', 'Api\FuncionarioController');
Route::resource('eleccion', 'Api\EleccionController');
Route::resource('rol', 'Api\RolController');
Route::resource('eleccioncomite', 'Api\EleccionComiteController');
Route::resource('voto', 'Api\VotoController');
Route::resource('votocandidato', 'Api\VotoCandidatoController');
Route::resource('funcionariocasilla', 'Api\FuncionarioCasillaController');
Route::resource('imeiautorizado', 'Api\imeiautorizadoController');

