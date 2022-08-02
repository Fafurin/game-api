<?php

namespace App\Handlers\Api\V1;

use App\Http\Resources\GameResource;
use App\Repositories\Api\V1\GameRepository;
use Illuminate\Http\Request;

class GameViewHandler implements GameViewHandlerContract
{
    public function __construct(
        public Request $request,
        public GameRepository $gameRepository
    )
    {
    }

    public function handle()
    {
        $id = $this->request->id;
        $game = $this->gameRepository->findById($id);
        if (is_null($game)) {
            return response()->json(['error' => true, 'message' => 'The game not found'], 404);
        }
        return response()->json(new GameResource($game), 200);
    }
}
