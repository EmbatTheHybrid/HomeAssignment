<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DeveloperController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/games');

Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::get('/games/create', [GameController::class, 'create'])->name('games.create');
Route::get('/games/{id}', [GameController::class, 'show'])->name('games.show');

Route::get('/developers', [DeveloperController::class, 'index'])->name('developers.index');
Route::get('/developer/create', [DeveloperController::class, 'create'])->name('developers.create');
Route::get('/developers/{id}', [DeveloperController::class, 'show'])->name('developers.show');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');


