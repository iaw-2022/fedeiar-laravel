<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => '1',
            'name' => 'Juan',
            'email' => 'juan@mail.com',
            'password' => bcrypt('123'),
            'nacionalidad' => 'argentino',
            'rol' => 'administrador',
        ]);

        DB::table('users')->insert([
            'id' => '2',
            'name' => 'Fede',
            'email' => 'iarlorifederico@gmail.com',
            'password' => bcrypt('123'),
            'nacionalidad' => 'argentino',
            'rol' => 'administrador',
        ]);
    }
}
