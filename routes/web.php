<?php

// Navbar Links Routes
Route::get('/', 'routeController@index');
Route::get('home', 'routeController@home');
Route::get('client', 'ClientController@show');
Route::get('asset', 'AssetController@show');
Route::get('test', 'TestController@show');
Route::get('import', 'routeController@import');

// Cards Routes
Route::get('client/{asset}', 'ClientController@assets');
Route::get('client/asset/{test}', 'AssetController@tests');
Route::get('client/asset/test/{id}', 'TestController@test');
Route::get('asset/{test}', 'AssetController@tests');
Route::get('asset/test/{id}', 'TestController@test');
Route::get('test/{id}', 'TestController@test');

// Testo-sama
Route::post('import/file', 'generalController@importExcelFile');