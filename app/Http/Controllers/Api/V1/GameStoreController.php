<?php

namespace App\Http\Controllers\Api\V1;

use App\Handlers\Api\V1\GameStoreHandlerContract;
use App\Http\Controllers\Controller;

class GameStoreController extends Controller implements GameControllerContract
{
    public function __construct(public GameStoreHandlerContract $handler)
    {
    }

    public function __invoke()
    {
        return $this->handler->handle();
    }
}
