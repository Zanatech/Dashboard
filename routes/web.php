<?php

// Login Routes
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

// Language Switcher

Route::get('home/{locale}', function ($locale) {
    App::setLocale($locale); 

    return view('home');
});

// Admin Panel

Route::get('/panel', 'AdminPanel@home')->name('panel');
Route::get('/panel/users', 'AdminPanel@showusers')->name('users');

// Links for Client
Route::get('/clients', 'UserController@showall')->name('clients');
Route::get('/client/{client}', 'UserController@assets');
Route::get('/create_client', 'UserController@new');
Route::post('/save_client', 'UserController@save');

// Links for Asset
Route::get('/assets', 'AssetController@showall')->name('assets');
Route::get('/asset/{asset}', 'AssetController@jobs');
Route::get('/create_asset', 'AssetController@new');
Route::post('/save_asset', 'AssetController@save');

// Links for Job
Route::get('/jobs', 'JobController@showall')->name('jobs');
Route::get('/job/{job}', 'JobController@tests');
Route::get('/create_job', 'JobController@new');
Route::post('/save_job', 'JobController@save');

// Links for Test
Route::get('/tests', 'TestController@showall')->name('tests');
Route::get('/test/{test}', 'TestController@details');
Route::get('/create_test', 'TestController@new');
Route::post('/save_test', 'TestController@save');

// Links for Import_File
Route::get('/import', 'ImporterController@showform');
Route::post('/import/file', 'ImporterController@import');
Route::get('/preview', 'ImporterController@previewform');
Route::post('/preview/file', 'ImporterController@preview');