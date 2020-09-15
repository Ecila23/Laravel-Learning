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
    return view('welcome');
});

Route::get('/test', function () {
    $name = request('name');

    return view('test', ['name' => $name]);
});

Route::get('/posts', 'PostsController@index');

Route::get('/posts/new', 'PostsController@create')->middleware('auth');

Route::post('/posts', 'PostsController@store');

Route::get('/posts/{post}', 'PostsController@show');

Route::get('/posts/{post}/edit', 'PostsController@edit')->middleware('auth');

Route::put('/posts/{post}', 'PostsController@update');

Route::delete('/posts/{post}', 'PostsController@delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/email', 'EmailController@show');

Route::post('/email', 'EmailController@store');

Route::get('/notifications/new', 'NotificationsController@create')->middleware('auth');

Route::post('/notifications', 'NotificationsController@store')->middleware('auth');

