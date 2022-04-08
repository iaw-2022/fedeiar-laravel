<?php

namespace Database\Seeders;

use App\Models\GameCategoryRelation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameCategoryRelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        GameCategoryRelation::create(array(
            'nombre_juego' => 'Celeste',
            'nombre_categoria' => 'any%'
        ));

        GameCategoryRelation::create(array(
            'nombre_juego' => 'Celeste',
            'nombre_categoria' => '100%'
        ));

        GameCategoryRelation::create(array(
            'nombre_juego' => 'Celeste',
            'nombre_categoria' => 'low%'
        ));

        GameCategoryRelation::create(array(
            'nombre_juego' => 'Portal',
            'nombre_categoria' => 'any%'
        ));
    }
}
