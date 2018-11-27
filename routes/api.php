<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//User
Route::get('/users','UserController@index');
Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
Route::get('/users/detail/{id}', 'UserController@showbyID');
Route::patch('users/update/{id}', 'UserController@update'); //ini juga belum mau jalan :(
//Product
Route::get('/products', 'ProductController@index');
Route::post('/store/{id}', 'ProductController@store');
Route::get('/products/{id}', 'ProductController@show');
Route::get('/products/detail/{id}', 'ProductController@showbyID');
Route::patch('products/update/{id}', 'ProductController@update'); 
Route::delete('/products/delete/{id}', 'ProductController@destroy');
//Feedback
Route::get('/feedbacks', 'FeedbackController@index');
Route::post('/storeFeedback/{id}', 'FeedbackController@storeFeedback');
Route::patch('feedbacks/update/{id}', 'FeedbackController@update'); 
Route::get('/feedbacks/detail/{id}', 'FeedbackController@showbyID');
Route::delete('/feedbacks/deleteFeedback/{id}', 'FeedbackController@destroy'); 
//Route::get('/feedbacks', 'FeedbackController@show');
//Item
Route::get('/items', 'ItemController@index');
Route::post('storeItem', 'ItemController@store');;

Route::group(['middleware' => 'auth:api'], function(){
   // Route::get('/users','UserController@index');
    Route::get('/users','UserController@show');
    Route::post('/products','ProductController@index');
    Route::patch('users/{user}','UserController@update');
});

