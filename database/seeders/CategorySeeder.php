<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models;
use App\Models\Category;

class CategorySeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        Category::create(array(
            'game_name' => 'Celeste',
            'category_name' => 'any%'
        ));

        Category::create(array(
            'game_name' => 'Celeste',
            'category_name' => '100%'
        ));

        Category::create(array(
            'game_name' => 'Celeste',
            'category_name' => 'low%'
        ));

        Category::create(array(
            'game_name' => 'Portal',
            'category_name' => 'any%'
        ));

        Category::create(array(
            'game_name' => 'Super Mario 64',
            'category_name' => 'any%'
        ));

        Category::create(array(
            'game_name' => 'Super Mario 64',
            'category_name' => '100%'
        ));

        Category::create(array(
            'game_name' => 'Super Mario 64',
            'category_name' => 'low%'
        ));

        Category::create(array(
            'game_name' => 'Super Mario 64',
            'category_name' => 'glitchless'
        ));

        Category::create(array(
            'game_name' => 'Hollow Knight',
            'category_name' => 'any%'
        ));

        Category::create(array(
            'game_name' => 'Hollow Knight',
            'category_name' => '100%'
        ));

        Category::create(array(
            'game_name' => 'Hollow Knight',
            'category_name' => 'low%'
        ));
    }
}
