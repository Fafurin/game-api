<?php

use Illuminate\Support\Facades\Route;

// пропускаем маршруты через посредников:
// auth_api - простая аутентификация по токену;
// api_json - возвращает ответы в json-формате
Route::group(['middleware' => ['api_json'], 'match' => ['post', 'get']], function () {

    // маршрут для вывода всех игр из бд
    Route::get('/games', [\App\Http\Controllers\Api\V1\Controllers\GameListController::class, 'index'])
        ->name('api.game.index');

    // маршрут для вывода игры по id
    Route::get('/games/{id}', [\App\Http\Controllers\Api\V1\Controllers\GameViewController::class, 'index'])
        ->where('id', '[0-9]+');

    // маршрут для вывода игр по названию жанра
    Route::get('/{genre}', [\App\Http\Controllers\Api\V1\Controllers\GameViewByGenreController::class, 'index'])
        ->where('genre', '[A-Za-z0-9]+');

    // маршрут для создания игры
    Route::post('/save', [\App\Http\Controllers\Api\V1\Controllers\GameStoreController::class, 'index']);
//
    // маршрут для изменения игры
    Route::put('/games/{id}', [\App\Http\Controllers\Api\V1\Controllers\GameUpdateController::class, 'index'])
        ->where('id', '[0-9]+');
//
    // маршрут для удаления игры
    Route::delete('/games/{id}', [\App\Http\Controllers\Api\V1\Controllers\GameDeleteController::class, 'delete'])
        ->where('id', '[0-9]+');
});
