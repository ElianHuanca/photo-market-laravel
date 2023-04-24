<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EventoController;
use App\Http\Controllers\Api\FotoController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//React
Route::post('comparerImages', [FotoController::class, 'comparerImages']);
Route::get('getEventoFotografo/{idUser}', [EventoController::class, 'getEventoFotografo']);
Route::post('postEvento', [EventoController::class, 'postEvento']);
Route::post('postFoto', [FotoController::class, 'postFoto']);
Route::post('subirFotos', [FotoController::class, 'subirFotos']);


//Flutter
Route::post('userPhothos', [AuthController::class, 'userPhothos']);
Route::get('getEventoParticipante/{idUser}', [EventoController::class, 'getEventoParticipante']);

Route::get('getEventoOrganizador/{idUser}', [EventoController::class, 'getEventoOrganizador']);

//AMBOS
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('getUserByEmail/{email}', [AuthController::class, 'getUserByEmail']);
Route::get('getEventoParticipante/{idUser}', [EventoController::class, 'getEventoParticipante']);
Route::get('getEventoFotografo/{idUser}', [EventoController::class, 'getEventoFotografo']);
Route::get('getEventoOrganizador/{idUser}', [EventoController::class, 'getEventoOrganizador']);
Route::post('postEvento', [EventoController::class, 'postEvento']);
Route::post('participarEvento', [EventoController::class, 'participarEvento']);

Route::get('getFotos/{idUser}/{idEvento}', [FotoController::class, 'getFotos']);
Route::put('putFotoUsuario', [FotoController::class, 'putFotoUsuario']);
Route::post('sendFotosToEvent', [FotoController::class, 'sendFotosToEvent']);

