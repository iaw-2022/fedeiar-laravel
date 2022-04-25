<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Game;
use App\Models\SpeedrunVideo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all();
        return view('games.gameIndex', ['games' => $games]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('games.gameCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'gameName' => 'required|unique:games,game_name',
            'categoryName' => 'required|array|min:1',
            'categoryName.*' => 'required'
        ],
        [
            'gameName.unique' => 'The game name has already been created.',
            'categoryName.required' => 'Add at least one category.',
            'categoryName.*.required' => 'Category name cannot be empty!',
        ]
        );

        $game = new Game();
        
        $game->game_name = $request->get('gameName');
        $categories = $request->input('categoryName.*');

        $game->save();

        foreach($categories as $categoryName){
            if($game->categories->where('category_name', $categoryName)->first() == null){
                $category = new Category();
                $category->game_id = $game->id;
                $category->category_name = $categoryName;
                $category->save();

                $game->refresh();
            }
        }

        return redirect('/games')->with('success', 'Game was added succesfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($gameName)
    {
        $categories = Game::where('game_name', $gameName)->first()->categories;
        return view('games.gameEdit', ['gameName' => $gameName, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $gameName)
    {
        $request->validate([
            'gameName' => ['required', Rule::unique('games', 'game_name')->ignore($gameName, 'game_name')],
            'categoryName' => 'required|array|min:1',
            'categoryName.*' => 'required'
        ],
        [
            'gameName.unique' => 'The game name has already been created.',
            'categoryName.required' => 'Add at least one category.',
            'categoryName.*.required' => 'Category name cannot be empty!',
        ]
        );
        
        $oldCategories = Game::where('game_name', $gameName)->first()->categories;
        $newCategories = $request->input('categoryName.*');

        foreach($oldCategories as $oldCategory){
            if(!in_array($oldCategory->category_name, $newCategories)){
                $oldCategory->delete();
            }
        }

        $game = Game::where('game_name', $gameName)->first();

        $game->game_name = $request->get('gameName');

        $game->update();

        foreach($newCategories as $categoryName){
            if(!$oldCategories->contains('category_name', $categoryName)){
                if(Category::where('game_id', $game->id)->where('category_name', $categoryName)->first() == null){
                    $category = new Category();
                    $category->game_id = $game->id;
                    $category->category_name = $categoryName;
                    $category->save();

                    $game->refresh();
                }
            }
        }

        return redirect('/games')->with('success', 'Game was updated succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($gameName)
    {
        $game = Game::where('game_name', $gameName)->first();
        $game->delete();
        return redirect('/games')->with('success', 'Game was deleted succesfully!');
    }
}
