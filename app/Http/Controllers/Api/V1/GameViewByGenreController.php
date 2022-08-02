<?php

namespace App\Http\Controllers\Api\V1;

use App\Handlers\Api\V1\GameViewByGenreHandlerContract;
use App\Http\Controllers\Controller;

class GameViewByGenreController extends Controller implements GameControllerContract
{
    public function __construct(public GameViewByGenreHandlerContract $handler)
    {
    }

    public function __invoke()
    {
        return $this->handler->handle();
    }
}
