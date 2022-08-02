<?php

use Illuminate\Support\Facades\Route;

// пропускаем маршруты через посредников:
// auth_api - простая аутентификация по токену;
// api_json - возвращает ответы в json-формате
Route::group(['middleware' => ['api_json'], 'namespace' => 'V1', 'match' => ['post', 'get']], function () {

    // маршрут для вывода всех игр из бд
    Route::get('/games', 'GameListController');

    // маршрут для вывода игры по id
    Route::get('/games/{id}', 'GameViewController')
        ->where('id', '[0-9]+');

    // маршрут для вывода игр по названию жанра
    Route::get('/{genre}', 'GameViewByGenreController')
        ->where('genre', '[A-Za-z0-9]+');

    // маршрут для создания игры
    Route::post('/save', 'GameStoreController');
//
    // маршрут для изменения игры
    Route::put('/games/{id}', 'GameUpdateController')
        ->where('id', '[0-9]+');
//
    // маршрут для удаления игры
    Route::delete('/games/{id}', 'GameDeleteController')
        ->where('id', '[0-9]+');
});
