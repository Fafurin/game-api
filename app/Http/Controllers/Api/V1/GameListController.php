<?php

namespace App\Http\Controllers\Api\V1;

use App\Handlers\Api\V1\GameListHandlerContract;
use App\Http\Controllers\Controller;

class GameListController extends Controller implements GameControllerContract
{
    public function __construct(public GameListHandlerContract $handler)
    {
    }

    public function __invoke()
    {
        return $this->handler->handle();
    }
}
