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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/example', function () {
    return view('ads.example');
});

Route::resource('ads','AdController');
Route::post('/ads/{id}', 'AdController@update');

Route::resource('interest','InterestController');
Route::post('/interest/{id}', 'InterestController@update');

Route::resource('location','LocationController');
Route::post('/location/{id}', 'LocationController@update');

Route::resource('product','ProductController');

