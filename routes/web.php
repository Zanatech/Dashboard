<?php



// Login Routes
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Language Switcher
Route::get('home/{locale}', function ($locale) {
    App::setLocale($locale); 

    return view('home');
});

// Links route Lv1
Route::get('/', 'HomeController@index')->name('home');
Route::get('/clients', 'UserController@showall')->name('clients');
Route::get('/assets', 'AssetController@showall')->name('assets');
Route::get('/jobs', 'JobController@showall')->name('jobs');
Route::get('/tests', 'TestController@showall')->name('tests');
Route::get('/import', 'TestController@import')->name('import');


// Links Routes Lv2 
Route::get('/client/{client}', 'UserController@clientassets');
Route::get('/asset/{asset}', 'AssetController@assetjobs');
Route::get('/job/{job}', 'JobController@jobtests');
Route::post('/import/file', 'TestController@importfile');
Route::get('/test/{test}', 'TestController@details');

// Create forms
Route::get('/create_client', 'CreateController@client');
Route::post('/save_client', 'CreateController@client_save');

Route::get('/create_asset', 'CreateController@asset');
Route::post('/save_asset', 'CreateController@asset_save');

Route::get('/create_job', 'CreateController@job');
Route::post('/save_job', 'CreateController@job_save');

Route::get('/create_test', 'CreateController@test');
Route::post('/save_test', 'CreateController@test_save');