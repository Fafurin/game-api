<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Genre;

class ShowController extends Controller
{
    public function __invoke(int $genre_id)
    {
        $genres = Genre::all();
        $games = Genre::find($genre_id)->games;
        return view('home.show', compact('games' , 'genres'));
    }
}
