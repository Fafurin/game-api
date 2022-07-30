<?php

namespace App\Http\Controllers\Api\V1\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\GameCollection;
use App\Models\Genre;

class GameViewByGenreController extends Controller
{
    public function index(string $genreName)
    {
        $genre = Genre::where('name', $genreName)->first();

        if (is_null($genre)) {
            return response()->json(['error' => true, 'message' => 'Genre not found'], 404);
        }
        $games = $genre->games()->orderBy('name')->get();
        return response()->json(new GameCollection($games), 200);
    }
}
