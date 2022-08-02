<?php

namespace App\Handlers\Api\V1;

use App\Http\Resources\GameCollection;
use App\Models\Game;
use Illuminate\Support\Facades\Cache;

class GameListHandler implements GameListHandlerContract
{
    public function handle()
    {
        return response()->json(new GameCollection(Cache::remember('games', 60 * 60 * 24, function () {
            return Game::all();
        })), 200);
    }
}
