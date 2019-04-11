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

//index page
Route::get('/', 'PageController@index');

//authentication
Auth::routes();

//home url assigned to home controller
Route::get('/home', 'HomeController@index')->name('home');

//user display page
Route::get('/display','AnimalController@display')->name('display_animals');

//get resource for animals and assign it to animal controller
Route::resource('animals', 'AnimalController');

//display animal and assign animal controller
Route::get('animal/index', 'AnimalController@index')->name('display_animal');

//adoption request page
//Route::get('/home/requested','HomeController@requested')->name('adoption_request');

//get resource for requests and assign request controller
Route::resource('requests', 'RequestController');

Route::get('/requested/{animals}', 'RequestController@create')->name('adoption_requests');

Route::get('/requested', 'RequestController@index')->name('requested');

Route::get('/viewrequests', 'RequestController@index')->name('viewrequests');

Route::resource('animals', 'RequestController');
