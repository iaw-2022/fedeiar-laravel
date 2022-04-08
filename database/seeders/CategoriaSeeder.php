<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        Categoria::create(array(
            'nombre' => 'any%'
        ));

        Categoria::create(array(
            'nombre' => '100%'
        ));

        Categoria::create(array(
            'nombre' => 'low%'
        ));

        Categoria::create(array(
            'nombre' => 'glitchless%'
        ));
    }
}
