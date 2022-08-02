<?php

namespace App\Handlers\Api\V1;

use App\Repositories\Api\V1\GameRepository;
use Illuminate\Http\Request;

class GameDeleteHandler implements GameDeleteHandlerContract
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
            return response()->json(['error' => true, 'message' => 'Not found'], 404);
        }
        $game->delete();
        return response()->json('', 204);
    }
}
