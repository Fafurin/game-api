<?php

namespace App\Http\Controllers\Admin\Genre;

use App\Http\Controllers\Controller;
use App\Models\Genre;

class EditController extends Controller
{
    public function __invoke(Genre $genre)
    {
        return view('admin.genre.edit', compact('genre'));
    }
}
