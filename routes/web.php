<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ['as' => 'welcome','uses' => 
	function () {
	return view('welcome');
}]);

    Route::get('/dashboard', ['as'=>'dashboard', 'uses'=>'DashboardController@getDashboard']);

// -------------------------------------------user----------------------------------------------------	

    Route::post('/users', ['as'=>'createUser', 'uses'=>'UserController@createUser']);
    Route::get('/users', ['as'=>'users', 'uses'=>'UserController@getUser']);

// -------------------------------------------service----------------------------------------------------	

    Route::post('/services', ['as'=>'createService', 'uses'=>'ServiceController@createService']);
    Route::get('/services', ['as'=>'services', 'uses'=>'ServiceController@getService']);

// -------------------------------------------service category--------------------------------------------

	Route::post('/servicescategory', ['as'=>'createServiceCategory', 'uses'=>'ServiceController@createServiceCategory']);
	Route::get('/servicescategory', ['as'=>'servicescategory', 'uses'=>'ServiceController@getServiceCategory']);    

// -------------------------------------------gallery----------------------------------------------------	

	Route::post('/gallery', ['as'=>'createGallery', 'uses'=>'AboutUsController@createGallery']);
	Route::get('/gallery', ['as'=>'galleries', 'uses'=>'AboutUsController@getGallery']);    

// -------------------------------------------image category---------------------------------------------

	Route::post('/imagecategory', ['as'=>'createGalleryCat', 'uses'=>'AboutUsController@createGalleryCat']);
	Route::get('/imagecategory', ['as'=>'gallerycat', 'uses'=>'AboutUsController@getGalleryCat']);