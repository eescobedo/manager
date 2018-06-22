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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/', 'DocumentController@index')->name('home');

Route::get('/documents/create', 'DocumentController@create')->name('create_document');
Route::post('/documents', 'DocumentController@store');

Route::get('/documents/{document}', 'DocumentController@show');
Route::get('/documents/{document}/edit', 'DocumentController@edit');
Route::put('/documents', 'DocumentController@update');

Route::get('/tags', 'TagsController@index')->name('tags');

