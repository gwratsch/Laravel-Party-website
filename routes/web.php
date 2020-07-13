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
    $users = App\User::all();
    return view('welcome', compact('users'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/party','PartiesController')->middleware('auth');
Route::resource('/wishlist','WishlistsController');
Route::post('/wishlist/create','WishlistsController@create');
Route::resource('/participant','ParticipantsController')->middleware('auth','participants');
Route::post('/participant/create','ParticipantsController@create')->middleware('auth','participants');
Route::get('/participant/{participant}/delete','ParticipantsController@destroy')->middleware('auth','participants');
