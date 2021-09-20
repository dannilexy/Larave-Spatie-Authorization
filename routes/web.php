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

Route::get('/admin', 'HomeController@admin')->name('admin');

Route::get('/user/{id}/view', 'HomeController@view')->name('admin');

Route::post('/activate', 'HomeController@activate')->name('activate');


Route::get('/workshop', 'WorkShopsController@index')->name('workshop');
Route::get('/showworkshop/{id}', 'WorkShopsController@show')->name('workshop');
Route::get('/createworkshop', 'WorkShopsController@create')->name('create');
Route::post('/addworkshop', 'WorkShopsController@store')->name('addworkshop');
Route::get('/editworkshop/{id}', 'WorkShopsController@edit')->name('editworks');
Route::post('/updateworkshop/{id}', 'WorkShopsController@update')->name('updateworkshop');
Route::get('/deleteworkshop/{id}', 'WorkShopsController@destroy')->name('deleteworkshop');


Route::get('/book/{id}', 'HomeController@Book')->name('book');
Route::post('/booknow', 'HomeController@AddBooking')->name('addbooking');

Route::get('/addopening/{id}', 'HomeController@AddOpening')->name('open');
Route::get('/deleteopening/{id}', 'HomeController@DeleteOpening')->name('delete');
Route::get('/bookings', 'HomeController@Bookings')->name('delete');
Route::post('/saveOpen/{id}','HomeController@Saveopen')->name('saveopen');






