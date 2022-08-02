<?php

namespace App\Commands\Api\V1;

use App\Models\Genre;
use App\Models\Studio;
use Illuminate\Support\Facades\DB;

class UpdateGameCommandHandler implements UpdateGameCommandHandlerContract
{
    public function handle($game, $request)
    {
        try {
            Db::beginTransaction();

            // меняем название игры
            if (isset($request['name'])) {
                $game->update(['name' => $request['name']]);
            }

            if (isset($request['genres'])) {
                // убираем лишние пробелы в жанрах
                $genres = array_filter(array_map('trim', explode(',', $request['genres'])));

                // получаем все жанры из бд
                $dbGenres = Genre::get()->pluck('title');

                // создаем пустой массив для жанров
                $genresArr = [];

                // в цикле проверяем наличие жанра в бд, если его нет - создаем и присоединяем к модели игры
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

            if (isset($request['studio'])) {
//          создаем студию если ее еще нет в бд
                $studio = Studio::firstOrCreate(['name' => $request['studio']]);

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
