<?php

namespace App\Commands\Api\V1;

interface CreateGameCommandHandlerContract
{
    public function handle(array $data);
}
