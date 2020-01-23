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
Route::resource('/', 'IndexController', ['only' => ['index', 'show']]);
// ユーザ登録処理
Route::post('/signup', 'UsersController@create');
// ユーザ登録画面に遷移
Route::get('/signup', 'UsersController@signup')->name('signup');
// ユーザ登録画面に遷移
Route::post('/signin', 'UsersController@signin')->name('signin');
// Route::post('/signin', 'UsersController@signin');
// ログインページに遷移
Route::get('/main/signout', 'UsersController@signout')->name('signout');
// ホーム画面（ログイン後）に遷移
Route::get('/main/{user}', 'UsersController@main')->name('main')->where('user','[0-9]+');
// ホーム画面（ログイン後）に遷移
Route::post('/trial/main', 'UsersController@trialMain')->name('trialMain');
// メモ登録処理
Route::post('/main/{user}', 'MemosController@store')->name('memoInsert');
// メモ個別表示
Route::get('/main/{user}/{memo}', 'MemosController@show')->name('memoShow')->where([
    'user' => '[0-9]+',
    'memo' => '[0-9]+'
    ]);
// メモ更新処理
Route::post('/main/{user}/{memo}/update', 'MemosController@update')->name('memoUpdate');
// メモ削除処理
Route::delete('/main/{user}/{memo}', 'MemosController@delete')->name('memoDelete');
