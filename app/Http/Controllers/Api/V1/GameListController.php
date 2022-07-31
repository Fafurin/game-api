<?php

namespace App\Http\Controllers\Api\V1;

use App\Handlers\Api\V1\GameHandlerContract;
use App\Http\Controllers\Controller;

class GameListController extends Controller implements GameControllerContract
{
    public function __construct(public GameHandlerContract $handler)
    {
    }

    public function index()
    {
        return $this->handler->handle();
    }
}
