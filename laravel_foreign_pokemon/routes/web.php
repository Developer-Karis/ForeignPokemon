<?php

use App\Http\Controllers\PokemonController;
use App\Http\Controllers\TypeController;
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

Route::get('/create-type', [TypeController::class, 'create'])->name('createType');
Route::post('/store-type', [TypeController::class, 'store'])->name('storeType');
Route::get('/delete-type/{id}', [TypeController::class, 'destroy']);

Route::get('/', [PokemonController::class, 'index'])->name('home');
Route::get('/create-pokemon', [PokemonController::class, 'create'])->name('createPokemon');
Route::post('/store-pokemon', [PokemonController::class, 'store'])->name('storePokemon');
Route::get('/show-pokemon/{id}', [PokemonController::class, 'show'])->name('showPokemon');
Route::get('/edit-pokemon/{id}', [PokemonController::class, 'edit'])->name('editPokemon');
Route::post('/update-pokemon/{id}', [PokemonController::class, 'update'])->name('updatePokemon');
Route::get('/delete-pokemon/{id}', [PokemonController::class, 'destroy'])->name('deletePokemon');
