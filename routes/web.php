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
// Route::get('/', 'UsersController@index')->name('index');
// ログインページに遷移、ログイン処理
Route::resource('/', 'IndexController', ['only' => ['index', 'store', 'show']]);
// ユーザ登録処理
Route::post('/signup', 'UsersController@create');
// ユーザ登録画面に遷移
Route::get('/signup', 'UsersController@signup')->name('signup');
// Route::post('/signin', 'UsersController@signin');
// ログインページに遷移
Route::get('/main/signout', 'UsersController@signout')->name('signout');
// ホーム画面（ログイン後）に遷移
Route::get('/main/{user}', 'UsersController@main')->name('main');
// メモ登録処理
Route::post('/main/{user}', 'MemosController@store')->name('memoInsert');
// メモ個別表示
Route::get('/main/{user}/{memo}', 'MemosController@show')->name('memoShow');
// メモ更新処理
Route::post('/main/{user}/{memo}/update', 'MemosController@update')->name('memoUpdate');
