<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Genre;
use App\Models\Studio;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data = [];
        $data['gamesCount'] = Game::all()->count();
        $data['studiosCount'] = Studio::all()->count();
        $data['genresCount'] = Genre::all()->count();
        return view('admin.main.index', compact('data'));
    }
}
