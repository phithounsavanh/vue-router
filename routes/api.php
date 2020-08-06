<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::namespace('Api')->group(function () {
    Route::get('/users', 'UsersController@index');
    Route::get('/users/{user}', 'UsersController@show');
    Route::put('/users/{user}', 'UsersController@update');
    Route::delete('/users/{user}','UsersController@destroy');
    Route::post('/users', 'UsersController@store');
});
