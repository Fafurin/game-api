<?php

namespace App\Http\Controllers\Api\V1;

use App\Handlers\Api\V1\GameUpdateHandlerContract;
use App\Http\Controllers\Controller;

class GameUpdateController extends Controller implements GameControllerContract
{
    public function __construct(public GameUpdateHandlerContract $handler)
    {
    }

    public function __invoke()
    {
        return $this->handler->handle();
    }
}
