<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Game;
use App\Models\SpeedrunVideo;
use App\Models\User;
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
        SpeedrunVideo::truncate();

        $game_id = Game::where('game_name', 'Celeste')->first()->id;
        SpeedrunVideo::create(array(
            'link_video' => 'link to video',
            'completion_time_minutes' => '320.5',
            'user_id' => User::where('name', 'bousher')->first()->id,
            'game_id' => $game_id,
            'category_id' => Category::where('game_id', $game_id)->where('category_name', '100%')->first()->id,
        ));

        $game_id = Game::where('game_name', 'Celeste')->first()->id;
        SpeedrunVideo::create(array(
            'link_video' => 'link to video',
            'completion_time_minutes' => '324.5',
            'user_id' => User::where('name', 'juan')->first()->id,
            'game_id' => $game_id,
            'category_id' => Category::where('game_id', $game_id)->where('category_name', '100%')->first()->id,
        ));

        $game_id = Game::where('game_name', 'Celeste')->first()->id;
        SpeedrunVideo::create(array(
            'link_video' => 'link to video',
            'completion_time_minutes' => '115.73',
            'user_id' => User::where('name', 'juan')->first()->id,
            'game_id' => $game_id,
            'category_id' => Category::where('game_id', $game_id)->where('category_name', 'any%')->first()->id,
        ));

        $game_id = Game::where('game_name', 'Portal')->first()->id;
        SpeedrunVideo::create(array(
            'link_video' => 'link to video',
            'completion_time_minutes' => '320.5',
            'user_id' => User::where('name', 'juan')->first()->id,
            'game_id' => $game_id,
            'category_id' => Category::where('game_id', $game_id)->where('category_name', 'any%')->first()->id,
        ));

       $game_id = Game::where('game_name', 'Portal')->first()->id;
        SpeedrunVideo::create(array(
            'link_video' => 'link to video',
            'completion_time_minutes' => '243.7',
            'user_id' => User::where('name', 'juan')->first()->id,
            'game_id' => $game_id,
            'category_id' => Category::where('game_id', $game_id)->where('category_name', 'any%')->first()->id,
        ));

        $game_id = Game::where('game_name', 'Super Mario 64')->first()->id;
        SpeedrunVideo::create(array(
            'link_video' => 'link to video',
            'completion_time_minutes' => '97.4',
            'user_id' => User::where('name', 'bousher')->first()->id,
            'game_id' => $game_id,
            'category_id' => Category::where('game_id', $game_id)->where('category_name', 'any%')->first()->id,
        ));

        $game_id = Game::where('game_name', 'Super Mario 64')->first()->id;
        SpeedrunVideo::create(array(
            'link_video' => 'link to video',
            'completion_time_minutes' => '101.7',
            'user_id' => User::where('name', 'federico')->first()->id,
            'game_id' => $game_id,
            'category_id' => Category::where('game_id', $game_id)->where('category_name', 'any%')->first()->id,
        ));

        $game_id = Game::where('game_name', 'Super Mario 64')->first()->id;
        SpeedrunVideo::create(array(
            'link_video' => 'link to video',
            'completion_time_minutes' => '500.92',
            'user_id' => User::where('name', 'bousher')->first()->id,
            'game_id' => $game_id,
            'category_id' => Category::where('game_id', $game_id)->where('category_name', '100%')->first()->id,
        ));

        $game_id = Game::where('game_name', 'Super Mario 64')->first()->id;
        SpeedrunVideo::create(array(
            'link_video' => 'link to video',
            'completion_time_minutes' => '525.66',
            'user_id' => User::where('name', 'peter')->first()->id,
            'game_id' => $game_id,
            'category_id' => Category::where('game_id', $game_id)->where('category_name', '100%')->first()->id,
        ));

        $game_id = Game::where('game_name', 'Super Mario 64')->first()->id;
        SpeedrunVideo::create(array(
            'link_video' => 'link to video',
            'completion_time_minutes' => '120.32',
            'user_id' => User::where('name', 'peter')->first()->id,
            'game_id' => $game_id,
            'category_id' => Category::where('game_id', $game_id)->where('category_name', 'low%')->first()->id,
        ));
        
        $game_id = Game::where('game_name', 'Super Mario 64')->first()->id;
        SpeedrunVideo::create(array(
            'link_video' => 'link to video',
            'completion_time_minutes' => '115.99',
            'user_id' => User::where('name', 'juan')->first()->id,
            'game_id' => $game_id,
            'category_id' => Category::where('game_id', $game_id)->where('category_name', 'low%')->first()->id,
        ));

    }
}
