<?php

namespace Database\Seeders;

use App\Models\Juego;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JuegoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Juego::create(array(
            'nombre' => 'Super Mario Bros.'
        ));

        Juego::create(array(
            'nombre' => 'Celeste'
        ));

        Juego::create(array(
            'nombre' => 'Portal'
        ));
    }
}
