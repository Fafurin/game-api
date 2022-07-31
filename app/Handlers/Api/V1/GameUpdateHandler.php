<?php

namespace App\Handlers\Api\V1;

use App\Commands\Api\V1\UpdateGameCommandHandler;
use App\Http\Resources\GameResource;
use App\Repositories\Api\V1\GameRepository;
use Illuminate\Http\Request;

class GameUpdateHandler
{
    public function __construct(
        public Request $request,
        public UpdateGameCommandHandler $handler,
        public GameRepository $gameRepository
    )
    {
    }

    public function handle($id)
    {
        $game = $this->gameRepository->findById($id);
        if (is_null($game)) {
            return response()->json(['error' => true, 'message' => 'The game not found'], 404);
        }

        $game = $this->handler->handle($game, $this->request);
        return response()->json(new GameResource($game), 200);
    }
}
