<?php

namespace App\Http\Controllers\Admin\Game;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Studio;

class CreateController extends Controller
{
    public function __invoke()
    {
        $studios = Studio::all();
        $genres = Genre::all();
        return view('admin.game.create', compact('studios', 'genres'));
    }
}
