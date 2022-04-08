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
            'username' => 'juan',
            'email' => 'juan@mail.com',
            'password' => bcrypt('123'),
            'nationality' => 'argentine',
            'role' => 'administrator',
        ));

        User::create(array(
            'username' => 'fede',
            'email' => 'iarlorifederico@gmail.com',
            'password' => bcrypt('123'),
            'nationality' => 'argentine',
            'role' => 'administrator'
        ));

        User::create(array(
            'username' => 'federico2',
            'email' => 'fedeiarlori@hotmail.com',
            'password' => bcrypt('123'),
            'nationality' => 'argentine',
            'role' => 'administrator'
        ));

        User::create(array(
            'username' => 'bousher',
            'email' => 'fede@mail.com',
            'password' => bcrypt('123'),
            'nationality' => 'argentine',
            'role' => 'administrator'
        ));
    }
}
