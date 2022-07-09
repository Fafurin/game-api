<?php

namespace App\Service;

use App\Models\Game;
use Illuminate\Support\Facades\DB;

class GameService
{
    public function store($data)
    {
        try {
            Db::beginTransaction();
            if(isset($data['genre_ids'])){
                $genreIds = $data['genre_ids'];
                unset($data['genre_ids']);
            }

            $game = Game::firstOrCreate($data);
            if(isset($genreIds)) {
                $game->genres()->attach($genreIds);
            }
            Db::commit();
        } catch (\Exception $e){
            Db::rollBack();
            abort(500);
        }
    }

    public function update($data, $game)
    {
        try {
            Db::beginTransaction();
            if(isset($data['genre_ids'])){
                $genreIds = $data['genre_ids'];
                unset($data['genre_ids']);
            }

            $game->update($data);
            if(isset($genreIds)){
                $game->genres()->sync($genreIds);
            }
            Db::commit();
        } catch (\Exception $e){
            Db::rollBack();
            abort(500);
        }
        return $game;
    }
}
