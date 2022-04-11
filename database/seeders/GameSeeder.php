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
            'nombre' => 'Super Mario Bros.'
        ));

        Game::create(array(
            'nombre' => 'Celeste'
        ));

        Game::create(array(
            'nombre' => 'Portal'
        ));
    }
}
