<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $videos = SpeedrunVideo::where('game_name', $gameName)->get();
        $categories = GameCategoryRelation::where('game_name', $gameName)->get();
        
        return view('videos', ['gameName' => $gameName, 'categories' => $categories, 'videos' => $videos]);
    }

    public function showCategoryVideos($gameName, $categoryName){
        $videos = SpeedrunVideo::where('game_name', $gameName);
        $videos = $videos->where('category_name', $categoryName)->get();

        $categories = GameCategoryRelation::where('game_name', $gameName)->get();
        
        return view('videos', ['gameName' => $gameName, 'categories' => $categories, 'videos' => $videos]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
