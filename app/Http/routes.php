<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::post('/add_cart', 'HomeController@addToCart');
Route::get('/get_cart', 'HomeController@getCart');
Route::get('/update_cart/{ID}/{QTY}', 'HomeController@updateCart');
Route::get('/destroy_cart', 'HomeController@destroyCart');

Route::auth();

Route::get('/home', 'HomeController@index');
Route::post('/saveCSV.html', 'HomeController@saveCSV');
Route::post('/uploadImage.html', 'HomeController@uploadImage');