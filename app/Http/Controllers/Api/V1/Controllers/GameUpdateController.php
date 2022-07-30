<?php

namespace App\Http\Controllers\Api\V1\Controllers;

use App\Http\Resources\GameResource;
use App\Models\Game;
use Illuminate\Http\Request;

class GameUpdateController extends BaseController
{
    public function index(Request $request, int $id)
    {
        $game = Game::find($id);
        if (is_null($game)) {
            return response()->json(['error' => true, 'message' => 'The game not found'], 404);
        }

        $game = $this->service->update($request, $game);
        return response()->json(new GameResource($game), 200);
    }
}
