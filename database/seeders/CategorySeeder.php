<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models;
use App\Models\Game;
use App\Models\Category;

class CategorySeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        Category::truncate();

        Category::create(array(
            'game_id' => Game::where('game_name', 'Super Mario Bros.')->first()->id,
            'category_name' => 'any%'
        ));

        Category::create(array(
            'game_id' => Game::where('game_name', 'Super Mario Bros.')->first()->id,
            'category_name' => 'warpless'
        ));

        Category::create(array(
            'game_id' => Game::where('game_name', 'Celeste')->first()->id,
            'category_name' => 'any%'
        ));

        Category::create(array(
            'game_id' => Game::where('game_name', 'Celeste')->first()->id,
            'category_name' => '100%'
        ));

        Category::create(array(
            'game_id' => Game::where('game_name', 'Celeste')->first()->id,
            'category_name' => 'low%'
        ));

        Category::create(array(
            'game_id' => Game::where('game_name', 'Portal')->first()->id,
            'category_name' => 'any%'
        ));

        Category::create(array(
            'game_id' => Game::where('game_name', 'Super Mario 64')->first()->id,
            'category_name' => 'any%'
        ));

        Category::create(array(
            'game_id' => Game::where('game_name', 'Super Mario 64')->first()->id,
            'category_name' => '100%'
        ));

        Category::create(array(
            'game_id' => Game::where('game_name', 'Super Mario 64')->first()->id,
            'category_name' => 'low%'
        ));

        Category::create(array(
            'game_id' => Game::where('game_name', 'Super Mario 64')->first()->id,
            'category_name' => 'glitchless'
        ));

        Category::create(array(
            'game_id' => Game::where('game_name', 'Hollow Knight')->first()->id,
            'category_name' => '100%'
        ));

        Category::create(array(
            'game_id' => Game::where('game_name', 'The Legend of Zelda: Ocarina of Time')->first()->id,
            'category_name' => 'any%'
        ));

        Category::create(array(
            'game_id' => Game::where('game_name', 'The Legend of Zelda: Ocarina of Time')->first()->id,
            'category_name' => '100%'
        ));

    }
}
