<?php
use Illuminate\Support\Facades\Route;

Route::GET('/', 'HomeController@index')->name('home.index');

Route::group(['prefix' => 'empresas'], function(){
    Route::GET('/', 'EmpresasController@index')->name('empresas.index');
    Route::GET('/create', 'EmpresasController@create')->name('empresas.create');
    Route::POST('/store', 'EmpresasController@store')->name('empresas.store');
});

Route::group(['prefix' => 'enderecos'], function(){
    Route::GET('/getDataByCEP/{cep}', 'EnderecosController@getDataByCep')->name('enderecos.getDataByCep');
    Route::GET('/getLocationByCEP/{cep}', 'EnderecosController@getGeoLocationByCep')->name('enderecos.getLocationByCep');
});

Route::group(['prefix' => 'documentos'], function(){
    Route::GET('/', 'DocumentosController@index')->name('documentos.index');
    Route::GET('/create', 'DocumentosController@create')->name('documentos.create');
    Route::POST('/store', 'DocumentosController@store')->name('documentos.store');
});

Route::group(['prefix' => 'documentosTipos'], function(){
    Route::GET('/', 'DocumentosTiposController@index')->name('documentosTipos.index');
    Route::GET('/create', 'DocumentosTiposController@create')->name('documentosTipos.create');
    Route::POST('/store', 'DocumentosTiposController@store')->name('documentosTipos.store');
    Route::DELETE('/delete/{id}', 'DocumentosTiposController@destroy')->name('documentosTipos.destroy');
});