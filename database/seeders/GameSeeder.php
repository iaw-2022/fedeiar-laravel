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
            'game_name' => 'Super Mario Bros.',
            'image_name' => 'superMarioBros.jpg'
        ));

        Game::create(array(
            'game_name' => 'Celeste',
            'image_name' => 'celeste.jpg'
        ));

        Game::create(array(
            'game_name' => 'Portal',
            'image_name' => 'portal.jpg'
        ));

        Game::create(array(
            'game_name' => 'Hollow Knight',
            'image_name' => 'hollow_knight.jpg'
        ));

        Game::create(array(
            'game_name' => 'Super Mario 64',
            'image_name' => 'SuperMario64.jpg'
        ));

        Game::create(array(
            'game_name' => 'The Legend of Zelda: Ocarina of Time',
            'image_name' => 'ZeldaOOT.jpg'
        ));
    }
}
