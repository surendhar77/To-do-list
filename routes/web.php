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

Route::get('/', 'WelcomeController@index')->name('index');

// Authentication routes.
Auth::routes();

Route::get('/tasks', 'TasksController@index')->name('home');
Route::get('/create','TasksController@create')->name('create');
Route::post('/tasks', 'TasksController@store')->name('store');
Route::get('/edit/{id}','TasksController@edit')->name('edit');

Route::post('/update/{id}','TasksController@update')->name('update');
Route::delete('/tasks/{task}', 'TasksController@destroy')->name('delete');
Route::patch('/tasks/{task}', 'TasksController@toggleDoneStatus')->name('status');


Route::get('completed','TasksController@filterCompletedStatus')->name('completed');
Route::get('incompleted','TasksController@filterInCompletedStatus')->name('incompleted');

Route::get('view','TasksController@show')->name('view');