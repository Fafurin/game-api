<?php

namespace App\Http\Controllers\Api\V1;

use App\Handlers\Api\V1\GameStoreHandler;
use App\Http\Controllers\Controller;

class GameStoreController extends Controller implements GameControllerContract
{
    public function __construct(public GameStoreHandler $handler)
    {
    }

    public function index()
    {
        return $this->handler->handle();
    }
}
