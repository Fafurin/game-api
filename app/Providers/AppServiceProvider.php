<?php

namespace App\Providers;

use App\Commands\Api\V1\CreateGameCommandHandler;
use App\Commands\Api\V1\CreateGameCommandHandlerContract;
use App\Commands\Api\V1\UpdateGameCommandHandler;
use App\Commands\Api\V1\UpdateGameCommandHandlerContract;
use App\Handlers\Api\V1\GameDeleteHandlerContract;
use App\Handlers\Api\V1\GameDeleteHandler;
use App\Handlers\Api\V1\GameListHandlerContract;
use App\Handlers\Api\V1\GameListHandler;
use App\Handlers\Api\V1\GameStoreHandlerContract;
use App\Handlers\Api\V1\GameStoreHandler;
use App\Handlers\Api\V1\GameUpdateHandler;
use App\Handlers\Api\V1\GameUpdateHandlerContract;
use App\Handlers\Api\V1\GameViewByGenreHandler;
use App\Handlers\Api\V1\GameViewByGenreHandlerContract;
use App\Handlers\Api\V1\GameViewHandler;
use App\Handlers\Api\V1\GameViewHandlerContract;
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
        $this->app->bind(GameListHandlerContract::class, GameListHandler::class);
        $this->app->bind(GameStoreHandlerContract::class, GameStoreHandler::class);
        $this->app->bind(GameDeleteHandlerContract::class, GameDeleteHandler::class);
        $this->app->bind(GameUpdateHandlerContract::class, GameUpdateHandler::class);
        $this->app->bind(GameViewHandlerContract::class, GameViewHandler::class);
        $this->app->bind(GameViewByGenreHandlerContract::class, GameViewByGenreHandler::class);
        $this->app->bind(CreateGameCommandHandlerContract::class, CreateGameCommandHandler::class);
        $this->app->bind(UpdateGameCommandHandlerContract::class, UpdateGameCommandHandler::class);
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
