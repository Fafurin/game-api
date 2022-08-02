<?php

namespace App\Handlers\Api\V1;

use App\Http\Resources\GameCollection;
use App\Repositories\Api\V1\GenreRepository;
use Illuminate\Http\Request;

class GameViewByGenreHandler implements GameViewByGenreHandlerContract
{
    public function __construct(
        public Request $request,
        public GenreRepository $genreRepository
    )
    {
    }

    public function handle()
    {
        $genreName = $this->request->genre;
        $genre = $this->genreRepository->getByName($genreName);
        if (is_null($genre)) {
            return response()->json(['error' => true, 'message' => 'Genre not found'], 404);
        }
        $games = $genre->games()->orderBy('name')->get();
        return response()->json(new GameCollection($games), 200);
    }
}
