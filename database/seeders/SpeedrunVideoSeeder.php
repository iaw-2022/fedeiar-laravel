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
            'link_video' => 'https://www.youtube.com/watch?v=j5j6l9ULxmI&t=108s',
            'completion_time_seconds' => '320',
            'user_id' => User::where('name', 'bousher')->first()->id,
            'game_id' => $game_id,
            'category_id' => Category::where('game_id', $game_id)->where('category_name', '100%')->first()->id,
        ));

        $game_id = Game::where('game_name', 'Celeste')->first()->id;
        SpeedrunVideo::create(array(
            'link_video' => 'https://www.youtube.com/watch?v=j5j6l9ULxmI&t=108s',
            'completion_time_seconds' => '324',
            'user_id' => User::where('name', 'juan')->first()->id,
            'game_id' => $game_id,
            'category_id' => Category::where('game_id', $game_id)->where('category_name', '100%')->first()->id,
        ));

        $game_id = Game::where('game_name', 'Celeste')->first()->id;
        SpeedrunVideo::create(array(
            'link_video' => 'https://www.youtube.com/watch?v=j5j6l9ULxmI&t=108s',
            'completion_time_seconds' => '115',
            'user_id' => User::where('name', 'juan')->first()->id,
            'game_id' => $game_id,
            'category_id' => Category::where('game_id', $game_id)->where('category_name', 'any%')->first()->id,
        ));

        $game_id = Game::where('game_name', 'Portal')->first()->id;
        SpeedrunVideo::create(array(
            'link_video' => 'https://www.youtube.com/watch?v=j5j6l9ULxmI&t=108s',
            'completion_time_seconds' => '320',
            'user_id' => User::where('name', 'juan')->first()->id,
            'game_id' => $game_id,
            'category_id' => Category::where('game_id', $game_id)->where('category_name', 'any%')->first()->id,
        ));

       $game_id = Game::where('game_name', 'Portal')->first()->id;
        SpeedrunVideo::create(array(
            'link_video' => 'https://www.youtube.com/watch?v=j5j6l9ULxmI&t=108s',
            'completion_time_seconds' => '243',
            'user_id' => User::where('name', 'juan')->first()->id,
            'game_id' => $game_id,
            'category_id' => Category::where('game_id', $game_id)->where('category_name', 'any%')->first()->id,
        ));

        $game_id = Game::where('game_name', 'Super Mario 64')->first()->id;
        SpeedrunVideo::create(array(
            'link_video' => 'https://www.youtube.com/watch?v=j5j6l9ULxmI&t=108s',
            'completion_time_seconds' => '97',
            'user_id' => User::where('name', 'bousher')->first()->id,
            'game_id' => $game_id,
            'category_id' => Category::where('game_id', $game_id)->where('category_name', 'any%')->first()->id,
        ));

        $game_id = Game::where('game_name', 'Super Mario 64')->first()->id;
        SpeedrunVideo::create(array(
            'link_video' => 'https://www.youtube.com/watch?v=j5j6l9ULxmI&t=108s',
            'completion_time_seconds' => '101',
            'user_id' => User::where('name', 'federico')->first()->id,
            'game_id' => $game_id,
            'category_id' => Category::where('game_id', $game_id)->where('category_name', 'any%')->first()->id,
        ));

        $game_id = Game::where('game_name', 'Super Mario 64')->first()->id;
        SpeedrunVideo::create(array(
            'link_video' => 'https://www.youtube.com/watch?v=j5j6l9ULxmI&t=108s',
            'completion_time_seconds' => '3872',
            'user_id' => User::where('name', 'bousher')->first()->id,
            'game_id' => $game_id,
            'category_id' => Category::where('game_id', $game_id)->where('category_name', '100%')->first()->id,
        ));

        $game_id = Game::where('game_name', 'Super Mario 64')->first()->id;
        SpeedrunVideo::create(array(
            'link_video' => 'https://www.youtube.com/watch?v=j5j6l9ULxmI&t=108s',
            'completion_time_seconds' => '4121',
            'user_id' => User::where('name', 'peter')->first()->id,
            'game_id' => $game_id,
            'category_id' => Category::where('game_id', $game_id)->where('category_name', '100%')->first()->id,
        ));

        $game_id = Game::where('game_name', 'Super Mario 64')->first()->id;
        SpeedrunVideo::create(array(
            'link_video' => 'https://www.youtube.com/watch?v=j5j6l9ULxmI&t=108s',
            'completion_time_seconds' => '2127',
            'user_id' => User::where('name', 'peter')->first()->id,
            'game_id' => $game_id,
            'category_id' => Category::where('game_id', $game_id)->where('category_name', 'low%')->first()->id,
        ));
        
        $game_id = Game::where('game_name', 'Super Mario 64')->first()->id;
        SpeedrunVideo::create(array(
            'link_video' => 'https://www.youtube.com/watch?v=j5j6l9ULxmI&t=108s',
            'completion_time_seconds' => '1875',
            'user_id' => User::where('name', 'juan')->first()->id,
            'game_id' => $game_id,
            'category_id' => Category::where('game_id', $game_id)->where('category_name', 'low%')->first()->id,
        ));

    }
}
