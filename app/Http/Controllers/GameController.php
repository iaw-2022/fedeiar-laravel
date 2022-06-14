<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Game;
use App\Models\SpeedrunVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all();
        $disk = Storage::disk('google'); // TODO: solamente funciona la primer solicitud, y todas las siguientes fallan.
        error_log($disk->exists('portal.jpg'));
        
        error_log($disk->exists('celeste.jpg'));
        
        
        foreach($games as $game){
            //error_log($disk->exists($game->image_name));
            $req = $disk->get($game->image_name);
            $file = fopen("images/".$game->image_name, "w");
            fwrite($file, $req);
            fclose($file);
            //$disk = Storage::disk('google');
        }
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
    public function store(Request $request){
        $request->validate([
            'gameName' => 'required|unique:games,game_name',
            'categoryName' => 'required|array|min:1',
            'categoryName.*' => 'required'
        ],
        [
            'gameName.unique' => 'The game with that name has already been created.',
            'categoryName.required' => 'Add at least one category.',
            'categoryName.*.required' => 'Category name cannot be empty!',
        ]
        );

        $game = new Game();

        $file = $request->file('gameImage');
        $fileName = $file->getClientOriginalName();
        
        Storage::disk('google')->put($fileName, $file->get());
        
        $game->game_name = $request->get('gameName');
        $game->image_name = $fileName;
        $categories = $request->input('categoryName.*');

        $game->save();
        
        $savedCategories = [];
        foreach($categories as $categoryName){
            if(!in_array($categoryName, $savedCategories)){
                array_push($savedCategories, $categoryName);
                $category = new Category();
                $category->game_id = $game->id;
                $category->category_name = $categoryName;
                $category->save();
            }
        }

        return redirect('/games')->with('success', $game->game_name.' was added successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($gameName){
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
    public function update(Request $request, $gameName){
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

        $savedCategories = [];
        foreach($newCategories as $categoryName){
            if(!$oldCategories->contains('category_name', $categoryName)){
                if(!in_array($categoryName, $savedCategories)){
                    array_push($savedCategories, $categoryName);
                    $category = new Category();
                    $category->game_id = $game->id;
                    $category->category_name = $categoryName;
                    $category->save();
                }
            }
        }

        return redirect('/games')->with('success', $gameName.' was updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($gameName){
        $game = Game::where('game_name', $gameName)->first();
        $game->delete();
        return redirect('/games')->with('success', $gameName.' was deleted successfully!');
    }
}
