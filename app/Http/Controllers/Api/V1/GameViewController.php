<?php

namespace App\Http\Controllers\Api\V1;

use App\Handlers\Api\V1\GameViewHandlerContract;
use App\Http\Controllers\Controller;

class GameViewController extends Controller implements GameControllerContract
{
    public function __construct(public GameViewHandlerContract $handler)
    {
    }

    public function __invoke()
    {
        return $this->handler->handle();
    }
}
