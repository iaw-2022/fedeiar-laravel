<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Game;
use App\Models\GameCategoryRelation;
use Illuminate\Http\Request;
use App\Models\SpeedrunVideo;

class SpeedrunVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($gameName){
        $game = Game::where('game_name', $gameName)->first();
        if($game == null){
            abort(404);
        }
        $categories = $game->categories;
        $videos = $game->videos;
        
        return view('videos.videoIndex', ['gameName' => $gameName, 'categories' => $categories, 'videos' => $videos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($gameName){
        $game = Game::where('game_name', $gameName)->first();
        if($game == null){
            abort(404);
        }
        $categories = $game->categories;
        $videos = $game->videos;
        
        return view('videos.videoCreate', ['gameName' => $gameName, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $gameName)
    {

        $speedrunVideo = new SpeedrunVideo();

        $speedrunVideo->username = auth()->user()->name;
        //$speedrunVideo->game_name = 


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showVideos($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
