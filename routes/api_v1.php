<?php

use Illuminate\Support\Facades\Route;

// пропускаем маршруты через посредников:
// auth_api - простая аутентификация по токену;
// api_json - возвращает ответы в json-формате
Route::group(['middleware' => ['api_json'], 'match' => ['post', 'get']], function () {

    // маршрут для вывода всех игр из бд
    Route::get('/games', [\App\Http\Controllers\Api\V1\GameListController::class, 'index']);

    // маршрут для вывода игры по id
    Route::get('/games/{id}', [\App\Http\Controllers\Api\V1\GameViewController::class, 'index'])
        ->where('id', '[0-9]+');

    // маршрут для вывода игр по названию жанра
    Route::get('/{genre}', [\App\Http\Controllers\Api\V1\GameViewByGenreController::class, 'index'])
        ->where('genre', '[A-Za-z0-9]+');

    // маршрут для создания игры
    Route::post('/save', [\App\Http\Controllers\Api\V1\GameStoreController::class, 'index']);
//
    // маршрут для изменения игры
    Route::put('/games/{id}', [\App\Http\Controllers\Api\V1\GameUpdateController::class, 'index'])
        ->where('id', '[0-9]+');
//
    // маршрут для удаления игры
    Route::delete('/games/{id}', [\App\Http\Controllers\Api\V1\GameDeleteController::class, 'index'])
        ->where('id', '[0-9]+');
});
