<?php

namespace App\Http\Controllers\Api\V1;

use App\Handlers\Api\V1\GameDeleteHandlerContract;
use App\Http\Controllers\Controller;

class GameDeleteController extends Controller implements GameControllerContract
{
    public function __construct(public GameDeleteHandlerContract $handler)
    {
    }

    public function __invoke()
    {
        return $this->handler->handle();
    }
}
