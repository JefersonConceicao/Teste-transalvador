<?php
use Illuminate\Support\Facades\Route;

Route::GET('/', 'EmpresaController@index')->name('empresa.index');

Route::group(['prefix' => 'empresa'], function(){
    Route::GET('/create', 'EmpresaController@create')->name('users.create');
    Route::POST('/store', 'EmpresaController@store')->name('users.store');
});
