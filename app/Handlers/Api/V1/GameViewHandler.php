<?php

namespace App\Handlers\Api\V1;

use App\Http\Resources\GameResource;
use App\Repositories\Api\V1\GameRepository;

class GameViewHandler
{
    public function __construct(public GameRepository $gameRepository)
    {
    }

    public function handle($id)
    {
        $game = $this->gameRepository->findById($id);
        if (is_null($game)) {
            return response()->json(['error' => true, 'message' => 'The game not found'], 404);
        }
        return response()->json(new GameResource($game), 200);
    }
}
