<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::put('update', 'App\Http\Controllers\PostController@update');


// Route::put('destroy', 'App\Http\Controllers\PostController@destroy');

Route::post('store', 'App\Http\Controllers\PostController@store');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
