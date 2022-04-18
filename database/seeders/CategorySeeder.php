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
            'name' => 'any%'
        ));

        Category::create(array(
            'name' => '100%'
        ));

        Category::create(array(
            'name' => 'low%'
        ));

        Category::create(array(
            'name' => 'glitchless'
        ));
    }
}
