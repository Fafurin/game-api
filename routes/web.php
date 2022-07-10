<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\Home'], function () {
    Route::get('/', 'IndexController')->name('home.index');
    Route::get('/{genre_id}/show', 'ShowController')->name('home.show');
});

//Админка
Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin'], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('admin.main.index');
    });

    Route::group(['namespace' => 'Game', 'prefix' => 'games'], function () {
        Route::get('/', 'IndexController')->name('admin.game.index');
        Route::get('/create', 'CreateController')->name('admin.game.create');
        Route::post('/', 'StoreController')->name('admin.game.store');
        Route::get('/{game}/edit', 'EditController')->name('admin.game.edit');
        Route::patch('/{game}', 'UpdateController')->name('admin.game.update');
        Route::delete('/{game}', 'DeleteController')->name('admin.game.delete');
    });

    Route::group(['namespace' => 'Studio', 'prefix' => 'studios'], function () {
        Route::get('/', 'IndexController')->name('admin.studio.index');
        Route::get('/create', 'CreateController')->name('admin.studio.create');
        Route::post('/', 'StoreController')->name('admin.studio.store');
        Route::get('/{studio}/edit', 'EditController')->name('admin.studio.edit');
        Route::patch('/{studio}', 'UpdateController')->name('admin.studio.update');
        Route::delete('/{studio}', 'DeleteController')->name('admin.studio.delete');
    });

    Route::group(['namespace' => 'Genre', 'prefix' => 'genres'], function () {
        Route::get('/', 'IndexController')->name('admin.genre.index');
        Route::get('/create', 'CreateController')->name('admin.genre.create');
        Route::post('/', 'StoreController')->name('admin.genre.store');
        Route::get('/{genre}/edit', 'EditController')->name('admin.genre.edit');
        Route::patch('/{genre}', 'UpdateController')->name('admin.genre.update');
        Route::delete('/{genre}', 'DeleteController')->name('admin.genre.delete');
    });
});

Auth::routes();

