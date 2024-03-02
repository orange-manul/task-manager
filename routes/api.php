<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'tasks'], function (){
    Route::get('/index', 'TaskController@index');
    Route::post('/store', 'TaskController@store');
    Route::get('/show/{task}', 'TaskController@show');
    Route::put('/update/{task}', 'TaskController@update');
    Route::delete('/{task}', 'TaskController@destroy');
});
