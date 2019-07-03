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
Route::get('/create_type','TypesController@index');

Route::post('create_type','TypesController@create');

Route::get('/show', 'TaskController@index');

Route::get('/create','TaskController@create');

Route::post('/save','TaskController@store');

Route::get('/tasks/{id}','TaskController@edit');

Route::patch('/tasks/{id}','TaskController@update');

Route::delete('tasks/{id}','TaskController@destroy');


Route::get('/', function(){
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
