<?php

namespace App\Commands\Api\V1;

use App\Models\Game;
use Illuminate\Http\Request;

interface UpdateGameCommandHandlerContract
{
    public function handle(Game $game, Request $request);
}
