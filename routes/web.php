<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\StorageController;


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
Route::get('/games/{id}/edit', [GameController::class, 'edit'])->name('games.edit');
Route::post('/games', [GameController::class, 'store'])->name('games.store');
Route::put('/games/{id}/edit', [GameController::class, 'update'])->name('games.update');
Route::delete('/games/{id}', [GameController::class, 'delete'])->name('games.delete');

Route::get('/developers', [DeveloperController::class, 'index'])->name('developers.index');
Route::get('/developer/create', [DeveloperController::class, 'create'])->name('developers.create');
Route::get('/developers/{id}', [DeveloperController::class, 'show'])->name('developers.show');
Route::get('/developers/{id}/edit', [DeveloperController::class, 'edit'])->name('developers.edit');
Route::post('/developers', [DeveloperController::class, 'store'])->name('developers.store');
Route::put('/developers/{id}/edit', [DeveloperController::class, 'update'])->name('developers.update');
Route::delete('/developers/{id}', [DeveloperController::class, 'delete'])->name('developers.delete');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');



