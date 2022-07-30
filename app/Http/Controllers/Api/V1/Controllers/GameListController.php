<?php

namespace App\Http\Controllers\Api\V1\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\GameCollection;
use App\Models\Game;
use Illuminate\Support\Facades\Cache;

class GameListController extends Controller
{
    public function index()
    {
        return response()->json(new GameCollection(Cache::remember('games', 60 * 60 * 24, function () {
            return Game::all();
        })), 200);
    }
}
