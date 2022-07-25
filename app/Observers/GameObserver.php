<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;

class GameObserver
{
    // удаляем игры из кэша при создании новой игры
    public function created()
    {
        Cache::forget('games');
    }

    // удаляем игры из кэша при изменении игры
    public function updated()
    {
        Cache::forget('games');
    }

    // удаляем игры из кэша при удалении игры
    public function deleted()
    {
        Cache::forget('games');
    }
}
