<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;

class GameObserver
{
    public function created()
    {
        Cache::forget('games');
    }

    public function updated()
    {
        Cache::forget('games');
    }

    public function deleted()
    {
        Cache::forget('games');
    }
}
