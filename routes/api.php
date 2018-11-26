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
Route::patch('users/{id}', 'UserController@update'); //ini juga belum mau jalan :(
//Product
Route::get('/products', 'ProductController@index');
Route::post('/store/{id}', 'ProductController@store');
Route::get('/products/{id}', 'ProductController@show');
Route::get('/products/detail/{id}', 'ProductController@showbyID');
Route::delete('/products/delete/{id}', 'ProductController@destroy');
Route::patch('products/update/{id}', 'ProductController@update'); 
//Feedback
Route::get('/feedbacks', 'FeedbackController@index');
Route::post('storeFeedback', 'FeedbackController@storeFeedback');
Route::delete('deleteFeedback', 'FeedbackController@destroy'); //ini belum mau jalan :(
//Route::get('/feedbacks', 'FeedbackController@show');
//Item
Route::get('/items', 'ItemController@index');
Route::post('storeItem', 'ItemController@store');
//INI APA INI
// Route::get('/products/{product}', 'ProductController@show');
// Route::delete('/products/{product}', 'ProductController@destroy');
// Route::patch('products/{products}','ProductController@update');
Route::group(['middleware' => 'auth:api'], function(){
   // Route::get('/users','UserController@index');
    Route::get('/users','UserController@show');
    Route::post('/products','ProductController@index');
    Route::patch('users/{user}','UserController@update');
});

