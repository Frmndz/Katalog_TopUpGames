<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\GamesController;


Route::get('/', [ItemsController::class, 'index'])->name('index');


Route::resource('items', ItemsController::class);
Route::resource('games', GamesController::class);