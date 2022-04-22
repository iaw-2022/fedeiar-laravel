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
            'gameName' => 'required|unique:games,name',
            'categoryName' => 'required|array|min:1',
            'categoryName.*' => 'required'
        ],
        [
            'gameName.unique' => 'The game name has already been created.',
            'categoryName.required' => 'Add at least one category.',
            'categoryName.*.required' => 'Category name cannot be empty!',
            'categoryName.*.unique' => 'The category for this game has already been created.'
        ]
        );

        $game = new Game();
        
        $game->name = $request->get('gameName');
        $categories = $request->input('categoryName.*');

        $game->save();

        foreach($categories as $categoryName){
            if(Category::where('game_name', $game->name)->where('category_name', $categoryName)->first() == null){
                $category = new Category();
                $category->game_name = $request->get('gameName');
                $category->category_name = $categoryName;
                $category->save();
            }
        }

        //session()->flash('success', 'Game was added succesfully!');

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
        $categories = Category::where('game_name', $gameName)->get();
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
            'gameName' => ['required', Rule::unique('games', 'name')->ignore($gameName, 'name')],
            'categoryName' => 'required|array|min:1',
            'categoryName.*' => 'required'
        ],
        [
            'gameName.unique' => 'The game name has already been created.',
            'categoryName.required' => 'Add at least one category.',
            'categoryName.*.required' => 'Category name cannot be empty!',
            'categoryName.*.unique' => 'The category for this game has already been created.'
        ]
        );
        
        $oldCategories = Category::where('game_name', $gameName)->get();
        $newCategories = $request->input('categoryName.*');

        foreach($oldCategories as $oldCategory){
            if(!in_array($oldCategory->category_name, $newCategories)){
                $oldCategory->delete();
            }
        }

        $game = Game::where('name', $gameName)->first();

        $game->name = $request->get('gameName');

        $game->update();

        foreach($newCategories as $categoryName){
            if(!$oldCategories->contains('category_name', $categoryName)){
                if(Category::where('game_name', $game->name)->where('category_name', $categoryName)->first() == null){
                    $category = new Category();
                    $category->game_name = $request->get('gameName');
                    $category->category_name = $categoryName;
                    $category->save();
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
        $game = Game::where('name', $gameName)->first();
        $game->delete();
        return redirect('/games')->with('success', 'Game was deleted succesfully!');
    }
}
