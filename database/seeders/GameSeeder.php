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

        $image = file_get_contents('public/seed_images/superMarioBros.jpg');
        $image = base64_encode($image);
        Game::create(array(
            'game_name' => 'Super Mario Bros.',
            'image' => $image
        ));

        $image = file_get_contents('public/seed_images/celeste.jpg');
        $image = base64_encode($image);
        Game::create(array(
            'game_name' => 'Celeste',
            'image' => $image
        ));

        $image = file_get_contents('public/seed_images/portal.jpg');
        $image = base64_encode($image);
        Game::create(array(
            'game_name' => 'Portal',
            'image' => $image
        ));

        $image = file_get_contents('public/seed_images/hollow_knight.jpg');
        $image = base64_encode($image);
        Game::create(array(
            'game_name' => 'Hollow Knight',
            'image' => $image
        ));

        $image = file_get_contents('public/seed_images/superMario64.jpg');
        $image = base64_encode($image);
        Game::create(array(
            'game_name' => 'Super Mario 64',
            'image' => $image
        ));

        $image = file_get_contents('public/seed_images/zeldaOOT.jpg');
        $image = base64_encode($image);
        Game::create(array(
            'game_name' => 'The Legend of Zelda: Ocarina of Time',
            'image' => $image
        ));
    }
}
