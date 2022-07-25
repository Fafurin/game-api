<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\GameCollection;
use App\Http\Resources\GameResource;
use App\Models\Game;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class GameController extends BaseController
{
    // получаем игры из бд, сохраняем в кэш и через коллекцию возвращаем json-ответ
    public function index()
    {
        return response()->json(new GameCollection(Cache::remember('games', 60 * 60 * 24, function () {
            return Game::all();
        })), 200);
    }

    // пытаемся получить игру из бд по id, либо через ресурс возвращаем игру в json-формате либо json-ответ 404
    public function show(int $id)
    {
        $game = Game::find($id);
        if (is_null($game)) {
            return response()->json(['error' => true, 'message' => 'The game not found'], 404);
        }
        return response()->json(new GameResource($game), 200);
    }

    // если правила валидации не соблюдены возвращаем json-ответ 400
    // иначе передаем данные из запроса в метод store класса GameService
    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), Game::rules());
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $game = $this->service->store($request->all());
        return response()->json(new GameResource($game), 201);
    }

    // пытаемся получить игру из бд по id, если игры нет - возвращаем json-ответ 404,
    // иначе передаем данные из запроса в метод update класса GameService
    public function update(Request $request, int $id)
    {
        $game = Game::find($id);
        if (is_null($game)) {
            return response()->json(['error' => true, 'message' => 'The game not found'], 404);
        }

        $game = $this->service->update($request, $game);
        return response()->json(new GameResource($game), 200);
    }

    // пытаемся получить игру из бд по id, если игры нет - возвращаем json-ответ 404,
    // иначе удаляем игру и возвращаем json-ответ 204
    public function delete(int $id)
    {
        $game = Game::find($id);
        if (is_null($game)) {
            return response()->json(['error' => true, 'message' => 'Not found'], 404);
        }
        $game->delete();
        return response()->json('', 204);
    }

    // пытаемся получить жанр из бд по названию, если жанра нет - возвращаем json-ответ 404,
    // иначе через коллекцию возвращаем игры в json-формате
    public function showByGenre(string $genreName)
    {
        $genre = Genre::where('name', $genreName)->first();

        if (is_null($genre)) {
            return response()->json(['error' => true, 'message' => 'Genre not found'], 404);
        }
        $games = $genre->games()->orderBy('name')->get();
        return response()->json(new GameCollection($games), 200);
    }
}
