<?php

use Illuminate\Support\Facades\Route;

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
    return view('login');
});

// Route::group(['prefix' => 'api', 'middleware' => ['check_api', /*'check_user'*/]], function () {
Route::group(['prefix' => 'api'], function () {
    Route::post('user/login', 'Api\UserController@login');
    Route::post('user/addUser', 'Api\UserController@addUser');

    Route::post('user/addList', 'Api\UserController@addList');
    
    Route::get('home', 'Api\UserController@getList');
});