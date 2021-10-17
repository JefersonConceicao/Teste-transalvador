<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'usuarios'], function(){
    Route::GET('/', 'UsersController@index')->name('users.index');
    Route::GET('/create', 'UsersController@create')->name('users.create');
});
