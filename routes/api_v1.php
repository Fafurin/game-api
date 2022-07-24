<?php

use App\Http\Controllers\Api\V1\GameController;
use Illuminate\Support\Facades\Route;

Route::get('/games', [GameController::class, 'index']);
Route::get('/games/{id}', [GameController::class, 'show']);
Route::get('/{genre}', [GameController::class, 'showByGenre']);
Route::post('/save', [GameController::class, 'save']);
Route::put('/games/{id}', [GameController::class, 'update']);
Route::delete('/games/{id}', [GameController::class, 'delete']);
