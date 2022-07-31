<?php

namespace App\Http\Controllers\Api\V1;

use App\Handlers\Api\V1\GameViewHandler;
use App\Http\Controllers\Controller;

class GameViewController extends Controller
{
    public function __construct(public GameViewHandler $handler)
    {
    }

    public function index($id)
    {
        return $this->handler->handle($id);
    }
}
