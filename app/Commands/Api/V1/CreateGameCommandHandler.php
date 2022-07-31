<?php

namespace App\Commands\Api\V1;

use App\Models\Game;
use App\Models\Genre;
use App\Models\Studio;
use Illuminate\Support\Facades\DB;

class CreateGameCommandHandler
{
    public function handle($data)
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
}
