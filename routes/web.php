<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return redirect()->route('items.index');
});
Route::resource('items', ItemsController::class);