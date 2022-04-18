<?php

namespace Database\Seeders;

use App\Models\SpeedrunVideo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpeedrunVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SpeedrunVideo::create(array(
            'link_video' => 'link to video',
            'completion_time_minutes' => '320.5',
            'username' => 'bousher',
            'game_name' => 'Celeste',
            'category_name' => '100%',
        ));

        SpeedrunVideo::create(array(
            'link_video' => 'link to video',
            'completion_time_minutes' => '324.5',
            'username' => 'juan',
            'game_name' => 'Celeste',
            'category_name' => '100%',
        ));

        SpeedrunVideo::create(array(
            'link_video' => 'link to video',
            'completion_time_minutes' => '115.73',
            'username' => 'juan',
            'game_name' => 'Celeste',
            'category_name' => 'any%',
        ));

        SpeedrunVideo::create(array(
            'link_video' => 'link to video',
            'completion_time_minutes' => '320.5',
            'username' => 'juan',
            'game_name' => 'Portal',
            'category_name' => 'any%',
        ));

        SpeedrunVideo::create(array(
            'link_video' => 'link to video',
            'completion_time_minutes' => '243.7',
            'username' => 'juan',
            'game_name' => 'Portal',
            'category_name' => 'any%',
        ));

        SpeedrunVideo::create(array(
            'link_video' => 'link to video',
            'completion_time_minutes' => '97.4',
            'username' => 'bousher',
            'game_name' => 'Super Mario 64',
            'category_name' => 'any%',
        ));

        SpeedrunVideo::create(array(
            'link_video' => 'link to video',
            'completion_time_minutes' => '101.7',
            'username' => 'federico',
            'game_name' => 'Super Mario 64',
            'category_name' => 'any%',
        ));

        SpeedrunVideo::create(array(
            'link_video' => 'link to video',
            'completion_time_minutes' => '500.92',
            'username' => 'bousher',
            'game_name' => 'Super Mario 64',
            'category_name' => '100%',
        ));

        SpeedrunVideo::create(array(
            'link_video' => 'link to video',
            'completion_time_minutes' => '525.66',
            'username' => 'peter',
            'game_name' => 'Super Mario 64',
            'category_name' => '100%',
        ));
    }
}
