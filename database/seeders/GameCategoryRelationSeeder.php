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
            'game_name' => 'Celeste',
            'category_name' => 'any%'
        ));

        GameCategoryRelation::create(array(
            'game_name' => 'Celeste',
            'category_name' => '100%'
        ));

        GameCategoryRelation::create(array(
            'game_name' => 'Celeste',
            'category_name' => 'low%'
        ));

        GameCategoryRelation::create(array(
            'game_name' => 'Portal',
            'category_name' => 'any%'
        ));

        GameCategoryRelation::create(array(
            'game_name' => 'Super Mario 64',
            'category_name' => 'any%'
        ));

        GameCategoryRelation::create(array(
            'game_name' => 'Super Mario 64',
            'category_name' => '100%'
        ));

        GameCategoryRelation::create(array(
            'game_name' => 'Super Mario 64',
            'category_name' => 'glitchless'
        ));

        GameCategoryRelation::create(array(
            'game_name' => 'Hollow Knight',
            'category_name' => 'any%'
        ));

        GameCategoryRelation::create(array(
            'game_name' => 'Hollow Knight',
            'category_name' => '100%'
        ));

        GameCategoryRelation::create(array(
            'game_name' => 'Hollow Knight',
            'category_name' => 'low%'
        ));
    }
}
