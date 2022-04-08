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
            'username' => 'juan',
            'nombre_juego' => 'Portal',
            'nombre_categoria' => 'any%',
        ));

        SpeedrunVideo::create(array(
            'link_video' => 'link to video',
            'completion_time_minutes' => '243.7',
            'username' => 'juan',
            'nombre_juego' => 'Portal',
            'nombre_categoria' => 'any%',
        ));

        SpeedrunVideo::create(array(
            'link_video' => 'link to video',
            'completion_time_minutes' => '320.5',
            'username' => 'bousher',
            'nombre_juego' => 'Celeste',
            'nombre_categoria' => '100%',
        ));
    }
}
