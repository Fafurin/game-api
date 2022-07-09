<?php

namespace App\Http\Controllers\Admin\Game;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Genre;
use App\Models\Studio;

class EditController extends Controller
{
    public function __invoke(Game $game)
    {
        $studios = Studio::all();
        $genres = Genre::all();
        return view('admin.game.edit', compact('game', 'studios', 'genres'));
    }
}
