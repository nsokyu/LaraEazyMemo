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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'UsersController@index');
Route::post('/signup', 'UsersController@create');
Route::get('/signup', 'UsersController@signup');
Route::post('/signin', 'UsersController@signin');
// Route::get('/{users}', 'UsersController@main');
Route::post('/{users}/memos', 'MemosController@store');

// Auth::routes();
Route::get('members/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('members/login', 'Auth\LoginController@login');
Route::post('members/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('members/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('members/register', 'Auth\RegisterController@register');
