<?php

use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\RankingController;


use Illuminate\Support\Facades\Route;


/* 
|--------------------------------------------------------------------------
| Team
|--------------------------------------------------------------------------
*/

//  Criar um novo time
Route::post('/teams', [TeamController::class, 'create']);

//  Listar todos os times
Route::get('/teams', [TeamController::class, 'listAll']);

// Listar time especifico, procurando pelo ID 
Route::get('/teams/{id}', [TeamController::class, 'listById']);


// Atualizar um time existente
Route::match(['put', 'patch'], '/teams/{id}', [TeamController::class, 'update']);

//  Deletar time
Route::delete('/teams/{id}', [TeamController::class, 'delete']);



/* 
|--------------------------------------------------------------------------
| Player
|--------------------------------------------------------------------------
*/

// Listar todos os jogadores
Route::get('/players', [PlayerController::class, 'listAll']);

// Listar jogador especifico, procurando pelo ID
Route::get('/players/{id}', [PlayerController::class, 'listById']);

//  Criar novo jogador 
Route::post('/players', [PlayerController::class, 'store']);

// Atualizar um jogador existente
Route::patch('/players/{id}', [PlayerController::class, 'update']);

// Deletar jogador 
Route::delete('/players/{id}', [PlayerController::class, 'delete']);


/* 
|--------------------------------------------------------------------------

|--------------------------------------------------------------------------
*/

// Listar todos os times 
Route::get('/matches', [GameController::class, 'listAll']);

//  Listar times especificos, procurando pelo ID
Route::get('/matches/{id}', [GameController::class, 'listById']);

// Criar um novo time
Route::post('/matches', [GameController::class, 'create']);

// Atualizar um time especifico
Route::patch('/matches/{id}', [GameController::class, 'update']);

// Excluir time
Route::delete('/matches/{id}', [GameController::class, 'delete']);


/* 
|--------------------------------------------------------------------------
| Ranking
|--------------------------------------------------------------------------
*/

// Listar todos os times
Route::get('/ranking', [RankingController::class, 'listAll']);
