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
Route::auth();
Route::get('/', function () {return view('app');});
//Home
Route::get('/dashboard', function () {return view('app');});
Route::get('/register', function () {return view('app');});
Route::get('/login', function () {return view('app');});
//Item
Route::get('/hair', function () {return view('app');});
Route::get('/create', function () {return view('app');});
Route::get('/body', function () {return view('app');});
Route::get('/buy/{index}', function () {return view('app');});
Route::get('/editItem/{id}', function () {return view('app');});
//Product
Route::get('/book', function () {return view('app');});
Route::get('/listBook', function () {return view('app');});
Route::get('/edit/{id}', function () {return view('app');});
//Feedback
Route::get('/feedback', function () {return view('app');});
Route::get('/viewFeedback', function () {return view('app');});
Route::get('/editFeedback', function () {return view('app');});
//Home
Route::get('/contact', function () {return view('app');});
Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
//Profile   
Route::get('/profile/{id}', function () {return view('app');});
Route::get('/update/{id}', function () {return view('app');});
//Job
Route::get('/requirements', function () {return view('app');});
Route::get('/viewregist', function () {return view('app');});
Route::get('/editJob', function () {return view('app');});


