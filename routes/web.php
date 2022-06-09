<?php

use App\Http\Controllers\GameController;
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

Route::get('/', function () {
    return view('home');
})->middleware(['auth']);

require __DIR__.'/auth.php';

// Game routes

Route::resource('/games', GameController::class, array('only' => array('index', 'create', 'store', 'edit', 'update', 'destroy') ) )->middleware(['auth']);

// Video routes

Route::get('/games/{gameName}/{id}/edit', [SpeedrunVideoController::class, 'edit'])->middleware(['auth']);
Route::patch('/games/{gameName}/{id}', [SpeedrunVideoController::class, 'update'])->middleware(['auth']);
Route::delete('/games/{gameName}/{id}', [SpeedrunVideoController::class, 'destroy'])->middleware(['auth']);
// Algunos métodos van en los Routes de arriba y no en el resource que viene a continuación ya que en Route::resource laravel asigna 2 veces {gameName} y genera un error.
Route::resource('/games/{gameName}', SpeedrunVideoController::class, array('only' => array('index', 'create', 'store') ) )->middleware(['auth']);

// User routes

Route::get('/users', [UserController::class, 'index'])->middleware(['auth']);
Route::delete('/users/{userName}', [UserController::class, 'destroy'])->middleware(['auth']);