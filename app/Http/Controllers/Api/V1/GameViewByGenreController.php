<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\GameCollection;
use App\Repositories\Api\V1\GenreRepository;

class GameViewByGenreController extends Controller
{
    public function __construct(public GenreRepository $genreRepository)
    {
    }

    public function index(string $genreName)
    {
        $genre = $this->genreRepository->getByName($genreName);

        if (is_null($genre)) {
            return response()->json(['error' => true, 'message' => 'Genre not found'], 404);
        }
        $games = $genre->games()->orderBy('name')->get();
        return response()->json(new GameCollection($games), 200);
    }
}
