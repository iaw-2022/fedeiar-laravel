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
            'nombre' => 'any%'
        ));

        Category::create(array(
            'nombre' => '100%'
        ));

        Category::create(array(
            'nombre' => 'low%'
        ));

        Category::create(array(
            'nombre' => 'glitchless%'
        ));
    }
}
