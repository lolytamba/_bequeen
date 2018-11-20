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

// Route::get('(any)', function () {
//     return view('app');
// })->where('any','.*');

Route::get('/', function () {return view('app');});
Route::get('/register', function () {return view('app');});
Route::get('/login', function () {return view('app');});
Route::get('/hair', function () {return view('app');});
Route::get('/cosmetic', function () {return view('app');});
Route::get('/body', function () {return view('app');});
Route::get('/book', function () {return view('app');});
Route::get('/feedback', function () {return view('app');});