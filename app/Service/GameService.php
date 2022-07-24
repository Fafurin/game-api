<?php

namespace App\Service;

use App\Models\Game;
use App\Models\Genre;
use App\Models\Studio;
use Illuminate\Support\Facades\DB;

class GameService
{
//    метод для добавления игр в бд
    public function store($data)
    {
        try {
            Db::beginTransaction();

            // создаем игру с названием name если ее еще нет в бд
            $game = Game::firstOrCreate(['name' => $data['name']]);

            // убираем лишние пробелы в жанрах
            $genres = array_filter(array_map('trim', explode(',', $data['genres'])));

            // получаем все жанры из бд
            $dbGenres = Genre::get()->pluck('name');

            // в цикле проверяем наличие жанра в бд, если его нет - создаем и присоединяем к модели игры
            foreach ($genres as $genre) {
                if (!($dbGenres->contains($genre))) {
                    $newGenre = new Genre(['name' => $genre]);
                    $game->genres()->attach($newGenre->id);
                }
                $genre = Genre::firstOrCreate(['name' => $genre]);
                $game->genres()->attach($genre->id);
            }

            // создаем студию если ее еще нет в бд
            $studio = Studio::firstOrCreate(['name' => $data['studio']]);

            // сохраняем игру в студию
            $studio->games()->save($game);

            Db::commit();
        } catch (\Exception $e) {
            Db::rollBack();
            return response()->json(['error' => true, 'message' => 'Error'], 404);
        }
        return $game;
    }

//    метод для изменения игр в бд
    public function update($data, $game)
    {
        try {
            Db::beginTransaction();

            // создаем игру с названием name если ее еще нет в бд
            if (isset($data['name'])) {
                $game->update(['name' => $data['name']]);
            }

            if (isset($data['genres'])) {
                // убираем лишние пробелы в жанрах
                $genres = array_filter(array_map('trim', explode(',', $data['genres'])));

                // получаем все жанры из бд
                $dbGenres = Genre::get()->pluck('title');

                // в цикле проверяем наличие жанра в бд, если его нет - создаем и присоединяем к модели игры
                $genresArr = [];

                foreach ($genres as $genre) {
                    if (!($dbGenres->contains($genre))) {
                        $newGenre = new Genre(['name' => $genre]);
                        $genresArrp[] = $newGenre->id;
                    }
                    $genre = Genre::firstOrCreate(['name' => $genre]);
                    $genresArr[] = $genre->id;
                }
                $game->genres()->sync($genresArr);
            }

            if (isset($data['studio'])) {
//          создаем студию если ее еще нет в бд
                $studio = Studio::firstOrCreate(['name' => $data['studio']]);

//          сохраняем игру в студию
                $studio->games()->save($game);
            }

            Db::commit();
        } catch (\Exception $e) {
            Db::rollBack();
            return response()->json(['error' => true, 'message' => 'Error'], 404);
        }
        return $game;
    }
}
