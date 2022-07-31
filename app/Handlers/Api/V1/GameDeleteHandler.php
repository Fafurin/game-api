<?php

namespace App\Handlers\Api\V1;

use App\Models\Game;

class GameDeleteHandler
{
    public function handle($id)
    {
        $game = Game::find($id);
        if (is_null($game)) {
            return response()->json(['error' => true, 'message' => 'Not found'], 404);
        }
        $game->delete();
        return response()->json('The game was successfully deleted', 204);
    }
}
