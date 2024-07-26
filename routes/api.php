<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::get('/search', 'Api\V1\Admin\PostController@search');
    Route::apiResource('posts', 'Api\V1\Admin\PostController');
});

