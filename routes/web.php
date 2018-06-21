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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'DocumentController@index');

Route::get('/documents/create', 'DocumentController@create');
Route::post('/documents', 'DocumentController@store');

Route::get('/documents/{document}', 'DocumentController@show');
