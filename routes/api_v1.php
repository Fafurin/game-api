<?php

use App\Http\Controllers\Api\V1\GameController;
use Illuminate\Support\Facades\Route;

// пропускаем маршруты через посредников:
// auth_api - простая аутентификация по токену;
// api_json - возвращает ответы в json-формате
Route::group(['middleware' => ['auth_api', 'api_json'], 'match' => ['post', 'get']], function () {

    // маршрут для вывода всех игр из бд
    Route::get('/games', [GameController::class, 'index'])->name('api.game.index');

    // маршрут для вывода игры по id
    Route::get('/games/{id}', [GameController::class, 'show'])
        ->where('id', '[0-9]+');

    // маршрут для вывода игр по названию жанра
    Route::get('/{genre}', [GameController::class, 'showByGenre'])
        ->where('genre', '[A-Za-z0-9]+');

    // маршрут для создания игры
    Route::post('/save', [GameController::class, 'save']);

    // маршрут для изменения игры
    Route::put('/games/{id}', [GameController::class, 'update'])
        ->where('id', '[0-9]+');

    // маршрут для удаления игры
    Route::delete('/games/{id}', [GameController::class, 'delete'])
        ->where('id', '[0-9]+');
});
