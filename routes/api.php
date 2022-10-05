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

Route::post('comparerImages', [FotoController::class, 'comparerImages']);

Route::post('userPhothos', [AuthController::class, 'userPhothos']);
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::get('getEventoParticipante/{idUser}', [EventoController::class, 'getEventoParticipante']);
Route::get('getEventoFotografo/{idUser}', [EventoController::class, 'getEventoFotografo']);
Route::get('getEventoOrganizador/{idUser}', [EventoController::class, 'getEventoOrganizador']);
Route::post('postEvento', [EventoController::class, 'postEvento']);

