<?php

// Default Routes
Route::get('/', 'HomeController@index')->name('home');

// Login Routes
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
