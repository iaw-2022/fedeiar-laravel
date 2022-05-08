<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Game;
use App\Models\GameCategoryRelation;
use Illuminate\Http\Request;
use App\Models\SpeedrunVideo;
use Illuminate\Validation\Rule;

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

    public static function secondsToTime($totalSeconds){
        $hours = floor($totalSeconds / 3600);
        $minutes = floor(($totalSeconds / 60) % 60);
        $seconds = $totalSeconds % 60;

        return ['hours' => $hours, 'minutes' => $minutes, 'seconds' => $seconds];
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
        
        return view('videos.videoCreate', ['gameName' => $gameName, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $gameName){

        $request->validate([
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'hours' => 'required|integer|between:0,999',
            'minutes' => 'required|integer|between:0,59',
            'seconds' => 'required|integer|between:0,59',
            'link' => 'required|url'
        ]);

        $speedrunVideo = new SpeedrunVideo();
        $category = Category::find($request->category_id);

        $speedrunVideo->user_id = auth()->user()->id;
        $speedrunVideo->game_id = $category->game_id;
        $speedrunVideo->category_id = $category->id;
        $speedrunVideo->link_video = $request->link;
        $speedrunVideo->completion_time_seconds = $this->timeToSeconds($request->hours, $request->minutes, $request->seconds);

        $speedrunVideo->save();

        $gameName = $category->game->game_name;
        return redirect("/games/".$gameName)->with('success', 'Video was added successfully!');
    }

    private function timeToSeconds($hours, $minutes, $seconds){
        return $hours * 3600 + $minutes * 60 + $seconds;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showVideos($id){
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($gameName, $videoId){
        $game = Game::where('game_name', $gameName)->first();
        if($game == null){
            abort(404);
        }
        $categories = $game->categories;
        $video = SpeedrunVideo::find($videoId);
        $arrayTime = SpeedrunVideoController::secondsToTime($video->completion_time_seconds);
        
        return view('videos.videoEdit', ['gameName' => $gameName, 'video' => $video, 'categories' => $categories, 'arrayTime' => $arrayTime]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $gameName, $id){
        $request->validate([
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'hours' => 'required|integer|between:0,999',
            'minutes' => 'required|integer|between:0,59',
            'seconds' => 'required|integer|between:0,59',
            'link' => 'required|url'
        ]);

        $speedrunVideo = SpeedrunVideo::find($id);
        $category = Category::find($request->category_id);

        $speedrunVideo->category_id = $category->id;
        $speedrunVideo->link_video = $request->link;
        $speedrunVideo->completion_time_seconds = $this->timeToSeconds($request->hours, $request->minutes, $request->seconds);

        $speedrunVideo->update();

        return redirect("/games/".$gameName)->with('success', 'Video was updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($gameName, $id){
        SpeedrunVideo::find($id)->delete();
        return redirect("/games/".$gameName)->with('success', 'Video was deleted successfully!');
    }
}
