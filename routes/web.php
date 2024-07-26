<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/search', [PostController::class, 'search']);
Route::resource('posts', PostController::class);
