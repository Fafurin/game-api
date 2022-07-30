<?php

namespace App\Http\Controllers\Api\V1\Controllers;

use App\Http\Resources\GameResource;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GameStoreController extends BaseController
{
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), Game::rules());
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $game = $this->service->store($request->all());
        return response()->json(new GameResource($game), 201);
    }
}
