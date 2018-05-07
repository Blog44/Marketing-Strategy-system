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

Route::get('/search-interest','SearchController@dataAjax');
Route::get('/search-product','SearchController@dataAjaxProduct');

Route::resource('ads','AdController');
Route::post('/ads/{id}', 'AdController@update');

Route::resource('interest','InterestController');
Route::post('/interest/{id}', 'InterestController@update');

Route::resource('location','LocationController');
Route::post('/location/{id}', 'LocationController@update');

Route::resource('product','ProductController');

Route::get('/report/index','ReportController@index')->name('report.index');
Route::get('/report/today','ReportController@today');
Route::get('/report/last_thirty','ReportController@last_thirty');
Route::get('/report/last_seven','ReportController@last_seven');
Route::get('/report/search','ReportController@search')->name('search');
Route::get('/report','ReportController@report');
Route::get('/report/generate','ReportController@generate');
Route::get('/report/generate/today','ReportController@today_report');
Route::get('/report/generate/last_seven','ReportController@last_seven_report');
Route::get('/report/generate/last_thirty','ReportController@last_thirty_report');


