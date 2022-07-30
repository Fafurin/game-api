<?php

namespace App\Http\Controllers\Api\V1\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\GameResource;
use App\Models\Game;

class GameViewController extends Controller
{
    public function index($id)
    {
        $game = Game::find($id);
        if (is_null($game)) {
            return response()->json(['error' => true, 'message' => 'The game not found'], 404);
        }
        return response()->json(new GameResource($game), 200);
    }
}
