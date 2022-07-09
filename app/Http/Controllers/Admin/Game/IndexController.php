<?php

namespace App\Http\Controllers\Admin\Game;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Genre;
use App\Models\Studio;

class IndexController extends Controller
{
    public function __invoke()
    {
        $games = Game::all();
        $studios = Studio::all();
        $genres = Genre::all();
        return view('admin.game.index', compact('games', 'studios', 'genres'));
    }
}
