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
    public function run(){
        User::truncate();

        User::create(array(
            'name' => 'juan',
            'email' => 'juan@mail.com',
            'password' => bcrypt('123'),
            'nationality' => 'Argentina',
            'role' => 'administrator',
        ));

        User::create(array(
            'name' => 'fede',
            'email' => 'iarlorifederico@gmail.com',
            'password' => bcrypt('123'),
            'nationality' => 'Argentina',
            'role' => 'administrator'
        ));

        User::create(array(
            'name' => 'federico',
            'email' => 'fedeiarlori@hotmail.com',
            'password' => bcrypt('123'),
            'nationality' => 'Argentina',
            'role' => 'administrator'
        ));

        User::create(array(
            'name' => 'bousher',
            'email' => 'fede@mail.com',
            'password' => bcrypt('123'),
            'nationality' => 'Argentina',
            'role' => 'administrator'
        ));

        User::create(array(
            'name' => 'peter',
            'email' => 'peter@mail.com',
            'password' => bcrypt('123'),
            'nationality' => 'United States',
            'role' => 'administrator'
        ));
    }
}
