<?php

// Login Routes
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Links Routes Lv1
Route::get('/', 'HomeController@index')->name('home');
Route::get('/clients', 'ClientController@showall')->name('clients');
Route::get('/assets', 'AssetController@showall')->name('assets');
Route::get('/jobs', 'JobController@showall')->name('jobs');
Route::get('/tests', 'TestController@showall')->name('tests');


// Links Routes Lv2
Route::get('/client/{client}', 'ClientController@clientassets');
Route::get('/asset/{asset}', 'AssetController@assetjobs');
Route::get('/job/{job}', 'JobController@jobtests');
