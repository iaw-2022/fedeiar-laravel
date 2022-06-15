<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\SpeedrunVideoController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\VerifyUserAdministrator;
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

Route::get('/games', [GameController::class, 'index'])->middleware(['auth']);
Route::get('/games/create', [GameController::class, 'create'])->middleware(['auth', VerifyUserAdministrator::class]);
Route::post('/games', [GameController::class, 'store'])->middleware(['auth', VerifyUserAdministrator::class]);
Route::get('/games/{gameName}/edit', [GameController::class, 'edit'])->middleware(['auth', VerifyUserAdministrator::class]);
Route::put('/games/{gameName}', [GameController::class, 'update'])->middleware(['auth', VerifyUserAdministrator::class]);
Route::delete('/games/{gameName}', [GameController::class, 'destroy'])->middleware(['auth', VerifyUserAdministrator::class]);

// Video routes

Route::get('/games/{gameName}/{id}/edit', [SpeedrunVideoController::class, 'edit'])->middleware(['auth']);
Route::patch('/games/{gameName}/{id}', [SpeedrunVideoController::class, 'update'])->middleware(['auth']);
Route::delete('/games/{gameName}/{id}', [SpeedrunVideoController::class, 'destroy'])->middleware(['auth']);
// Algunos métodos van en los Routes de arriba y no en el resource que viene a continuación ya que en Route::resource laravel asigna 2 veces {gameName} y genera un error.
Route::resource('/games/{gameName}', SpeedrunVideoController::class, array('only' => array('index', 'create', 'store') ) )->middleware(['auth']);

// User routes

Route::get('/users', [UserController::class, 'index'])->middleware(['auth', VerifyUserAdministrator::class]);
Route::delete('/users/{userName}', [UserController::class, 'destroy'])->middleware(['auth']); // TODO: podríamos pasarle el middleware también a este? si hacemos esto, no hace falta el chequeo en el controller no?