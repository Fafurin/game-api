<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Genre;

class IndexController extends Controller
{
    public function __invoke()
    {
        $games = Game::orderBy('created_at', 'desc')
            ->paginate(10);
        $genres = Genre::all();
        return view('home.index', compact( 'games', 'genres'));
    }
}
