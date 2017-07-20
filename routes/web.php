<?php

// Default Routes
Route::get('/', function () {
    return view('welcome');
});

// Login Routes
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
