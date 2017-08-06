<?php



// Login Routes
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Role Fork Routes
Route::get('/', 'HomeController@index')->name('home');
Route::get('/clients', 'UserController@showall')->name('clients');
Route::get('/assets', 'AssetController@showall')->name('assets');
Route::get('/jobs', 'JobController@showall')->name('jobs');
Route::get('/tests', 'TestController@showall')->name('tests');


// Links Routes Lv2 
Route::get('/client/{client}', 'UserController@clientassets');
Route::get('/asset/{asset}', 'AssetController@assetjobs');
Route::get('/job/{job}', 'JobController@jobtests');

//Error
Route::get('/404', function () {
	return view('errors.404');
});

Route::get('/denied', function () {
	return view('errors.no_access');
});

Route::get('/guest', function () {
	return view('errors.letlogin');
});