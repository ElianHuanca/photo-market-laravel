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

//React(Organizador Y Fotografo)

Route::post('postEvento', [EventoController::class, 'postEvento']);
Route::post('postFotoByFotografo', [FotoController::class, 'postFotoByFotografo']);//Catalogo
Route::post('postFotoByEvento', [FotoController::class, 'postFotoByEvento']);//IA y Subida De Fotos Del Evento
Route::get('getEventoOrganizador/{idUser}', [EventoController::class, 'getEventoOrganizador']);
Route::get('getFotos/{idUser}/{idRol}/{idEvento}', [FotoController::class, 'getFotos']);
Route::get('getFotografos', [EventoController::class, 'getFotografos']);

//Flutter(Cliente)
Route::put('buyFotoUsuario/{idUser}/{idFoto}', [FotoController::class, 'buyFotoUsuario']);
Route::get('getFotosCliente/{idUser}/{idEvento}', [FotoController::class, 'getFotosCliente']);
Route::post('userPhotho', [AuthController::class, 'userPhotho']);

//AMBOS
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('getEventoParticipante/{idUser}', [EventoController::class, 'getEventoParticipante']);
Route::post('participarEvento', [EventoController::class, 'participarEvento']);

Route::get('getParticipantesByEvento/{idEvento}', [FotoController::class, 'getParticipantesByEvento']);
Route::post('compararFotos', [FotoController::class, 'compararFotos']);
Route::post('postFoto', [FotoController::class, 'postFoto']);