<?php

namespace Tests\Feature\Api;

use App\Models\Game;
use App\Models\Genre;
use App\Models\Studio;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GameTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_all_games()
    {
        $genres = Genre::factory()->count(2)->create();

        $game = Game::factory()
            ->for(Studio::factory())
            ->hasAttached($genres)
            ->create();

        $response = $this->getJson(route('api.game.index'));

        $response->assertStatus(200);

        $response->assertJson(
            [[
                'id' => $game->id,
                'name' => $game->name,
                'studio' => $game->studio->name,
                'genres' => $game->genres->pluck('name')->toArray(),
            ]]
        );
    }
}
