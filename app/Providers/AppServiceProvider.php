<?php

namespace App\Providers;

use App\Handlers\Api\V1\GameHandlerContract;
use App\Handlers\Api\V1\GameListHandler;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(GameHandlerContract::class, GameListHandler::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
