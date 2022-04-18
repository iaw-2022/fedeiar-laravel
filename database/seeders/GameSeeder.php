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
        Game::create(array(
            'name' => 'Super Mario Bros.'
        ));

        Game::create(array(
            'name' => 'Celeste'
        ));

        Game::create(array(
            'name' => 'Portal'
        ));

        Game::create(array(
            'name' => 'Hollow Knight'
        ));

        Game::create(array(
            'name' => 'Super Mario 64'
        ));

        Game::create(array(
            'name' => 'The Legend of Zelda: Ocarina of Time'
        ));
    }
}
