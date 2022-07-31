<?php

namespace App\Http\Controllers\Api\V1;

use App\Handlers\Api\V1\GameDeleteHandler;
use App\Http\Controllers\Controller;

class GameDeleteController extends Controller
{
    public function __construct(public GameDeleteHandler $handler)
    {
    }

    public function index($id)
    {
        return $this->handler->handle($id);
    }
}
