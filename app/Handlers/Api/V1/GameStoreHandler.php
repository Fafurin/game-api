<?php

namespace App\Handlers\Api\V1;

use App\Commands\Api\V1\CreateGameCommandHandler;
use App\Http\Resources\GameResource;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GameStoreHandler
{
    public function __construct(public Request $request, public CreateGameCommandHandler $handler)
    {
    }

    public function handle()
    {
        $validator = Validator::make($this->request->all(), Game::rules());
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $game = $this->handler->handle($this->request->all());
        return response()->json(new GameResource($game), 201);
    }
}
