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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/cards', 'CardController@index')->name('overview');
Route::get('/card/{card}', 'CardController@show')->name('card.show');
Route::post('/card', 'CardController@store')->name('card.store');
Route::put('/card/{card}/score', 'ScoreController@update')->name('score.update');