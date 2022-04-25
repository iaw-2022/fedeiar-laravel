<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Game::truncate();

        Game::create(array(
            'game_name' => 'Super Mario Bros.'
        ));

        Game::create(array(
            'game_name' => 'Celeste'
        ));

        Game::create(array(
            'game_name' => 'Portal'
        ));

        Game::create(array(
            'game_name' => 'Hollow Knight'
        ));

        Game::create(array(
            'game_name' => 'Super Mario 64'
        ));

        Game::create(array(
            'game_name' => 'The Legend of Zelda: Ocarina of Time'
        ));
    }
}
