<?php

namespace App\Repositories\Api\V1;

use App\Models\Genre;

class GenreRepository
{
    public function getByName($name)
    {
        return Genre::where('name', $name)->first();
    }
}
