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

//user display page for adopting animals
Route::get('/display','AnimalController@display')->name('display');

//get resource for requests and assign request controller
Route::resource('requests', 'RequestController');

//display
Route::get('/requested/{animals}', 'RequestController@create')->name('adoption_requests');

Route::get('/requested', 'RequestController@index')->name('requested');

Route::post('/viewrequests/{adoption}/{animal}', ['as' => 'review', 'uses' => 'RequestController@review']);

Route::get('/userrequests','RequestController@user')->name('userrequests');

//get resource and assign home to home controller
Route::resource('home', 'HomeController');



Route::middleware(['auth','admin'])->group(function() {
  // put all admin routes(whole line) in here
  Route::get('/user/{username}', 'UserController@show')->name('user');
  //gets the view which shows all the pending adoption requests and make decision
  Route::get('/viewrequests', 'RequestController@index')->name('viewrequests');
  //view which shows the all the requests ever made
  Route::get('/allrequests','RequestController@admin')->name('allrequests');
  //admin using this view to display animals with actions
  Route::get('animal/index', 'AnimalController@user')->name('display_animals');
  //get resource for animals and assign it to animal controller
  Route::resource('animals', 'AnimalController');
  // this is animal details page
  Route::get('animals/index', 'AnimalController@index')->name('display_animal');
});
