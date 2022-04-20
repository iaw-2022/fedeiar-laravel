<?php

namespace Database\Seeders;

use App\Models\GameCategoryRelation;
use App\Models\SpeedrunVideo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(GameSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SpeedrunVideoSeeder::class);
    }
}
