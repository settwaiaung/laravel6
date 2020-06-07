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

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/public/receipe/{receipe}', 'HomeController@show');


Route::get('/receipe/download', 'ReceipeController@export');
Route::resource('receipe', 'ReceipeController');


Route::resource('category', 'CategoryController');

Route::get('dashboard', 'DashboardController@dashboard');



