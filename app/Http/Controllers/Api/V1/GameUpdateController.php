<?php

namespace App\Http\Controllers\Api\V1;

use App\Handlers\Api\V1\GameUpdateHandler;
use App\Http\Controllers\Controller;

class GameUpdateController extends Controller
{
    public function __construct(public GameUpdateHandler $handler)
    {
    }

    public function index($id)
    {
        return $this->handler->handle($id);
    }


}
