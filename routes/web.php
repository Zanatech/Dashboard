<?php

// Navbar Links Routes
Route::get('/', 'routeController@index');
Route::get('home', 'routeController@home');
Route::get('client', 'ClientController@show');
Route::get('asset', 'AssetController@show');
Route::get('import', 'routeController@import');

// Functions Routes
// Client Routes
Route::get('client/{name}_asset', 'ClientController@assets');
Route::get('client/{name}_{asset}/test', 'ClientController@test')
Route::get('client/{name}_{asset}/{test}/result', 'ClientController@result');

// Asset Routes
Route::get('asset/test', 'AssetController@test');
Route::get('asset/test/result', 'AssetController@result');

// Test Routes
Route::get('test/result', 'TestController@result');

// Testo-sama
Route::post('import/file', 'generalController@importExcelFile');
Route::get('result/{id}', 'TestController@show');