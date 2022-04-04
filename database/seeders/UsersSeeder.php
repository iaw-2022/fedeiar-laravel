<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(array(
            'name' => 'Juan',
            'email' => 'juan@mail.com',
            'password' => bcrypt('123'),
            'nacionalidad' => 'argentino',
            'rol' => 'administrador',
        ));

        User::create(array(
            'name' => 'Fede',
            'email' => 'iarlorifederico@gmail.com',
            'password' => bcrypt('123'),
            'nacionalidad' => 'argentino',
            'rol' => 'administrador'
        ));

        User::create(array(
            'name' => 'Federico2',
            'email' => 'fedeiarlori@hotmail.com',
            'password' => bcrypt('123'),
            'nacionalidad' => 'argentino',
            'rol' => 'administrador'
        ));
    }
}
