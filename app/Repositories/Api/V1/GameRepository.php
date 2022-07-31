<?php

namespace App\Repositories\Api\V1;

use App\Models\Game;

class GameRepository
{
    public function findById(int $id)
    {
        return Game::find($id) ? Game::find($id) : null;
    }
}
