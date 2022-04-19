<?php

use App\Http\Controllers\GamesController;
use App\Http\Controllers\SpeedrunVideoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', function () {
    return view('home');
})->middleware(['auth']);

require __DIR__.'/auth.php';

Route::resource('/games', GamesController::class, array('only' => array('index', 'create', 'store') ) );
/*
Route::get('/games', [GamesController::class, 'index'])->middleware(['auth']);
Route::get('/games/create', [GamesController::class, 'create'])->middleware(['auth']);
*/
Route::get('/games/{gameName}', [SpeedrunVideoController::class, 'index'])->middleware(['auth']);

Route::get('/users', [UserController::class, 'index'])->middleware(['auth']);