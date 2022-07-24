<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\V1\GameStoreRequest;
use App\Http\Requests\Api\V1\GameUpdateRequest;
use App\Http\Resources\GameCollection;
use App\Http\Resources\GameResource;
use App\Models\Game;
use App\Models\Genre;
use Illuminate\Support\Facades\Cache;

class GameController extends BaseController
{
    public function index()
    {
        return response()->json(new GameCollection(Cache::remember('games', 60 * 60 * 24, function () {
            return Game::all();
        })), 200);
    }

    public function show(int $id)
    {
        $game = Game::find($id);
        if (is_null($game)) {
            return response()->json(['error' => true, 'message' => 'Not found'], 404);
        }
        return response()->json(new GameResource($game), 200);
    }

    public function save(GameStoreRequest $request)
    {
        $data = $request->validated();
        // передаем data в метод store GameService
        $game = $this->service->store($data);

        return response()->json(new GameResource($game), 201);
    }

    public function update(GameUpdateRequest $request, int $id)
    {
        $game = Game::find($id);
        if (is_null($game)) {
            return response()->json(['error' => true, 'message' => 'Not found'], 404);
        }
        $data = $request->validated();
//        // передаем data в метод store GameService
        $game = $this->service->update($data, $game);

        return response()->json(new GameResource($game), 200);
    }

    public function delete(int $id)
    {
        $game = Game::find($id);
        if (is_null($game)) {
            return response()->json(['error' => true, 'message' => 'Not found'], 404);
        }
        $game->delete();
        return response()->json('', 204);
    }

    public function showByGenre(string $genreName)
    {
        $genre = Genre::where('name', $genreName)->first();

        $games = $genre->games()->orderBy('name')->get();

        return response()->json(new GameCollection($games), 200);
    }
}
