<?php

namespace App\Http\Controllers\Admin\Game;

use App\Http\Controllers\Controller;
use App\Service\GameService;

class BaseController extends Controller
{
    public $service;

    public function __construct(GameService $service)
    {
        $this->service = $service;
    }


}
