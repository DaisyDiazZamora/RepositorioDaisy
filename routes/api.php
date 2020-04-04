<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*

Route::resource('candidato', 'Api\CandidatoController');
Route::resource('funcionario', 'Api\FuncionarioController');
Route::resource('eleccion', 'Api\EleccionController');
Route::resource('rol', 'Api\RolController');
Route::resource('eleccioncomite', 'Api\EleccionComiteController');
Route::resource('voto', 'Api\VotoController');
Route::resource('votocandidato', 'Api\VotoCandidatoController');
Route::resource('funcionariocasilla', 'Api\FuncionarioCasillaController');
Route::resource('imeiautorizado', 'Api\imeiautorizadoController');

*/