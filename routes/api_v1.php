<?php

use App\Http\Controllers\Api\V1\GameController;
use Illuminate\Support\Facades\Route;

Route::get('/games', [GameController::class, 'index']);
Route::get('/games/{id}', [GameController::class, 'show'])
    ->where('id', '[0-9]+');
Route::get('/{genre}', [GameController::class, 'showByGenre'])
    ->where('genre', '[A-Za-z]+');
Route::post('/save', [GameController::class, 'save']);
Route::put('/games/{id}', [GameController::class, 'update'])
    ->where('id', '[0-9]+');
Route::delete('/games/{id}', [GameController::class, 'delete'])
    ->where('id', '[0-9]+');
