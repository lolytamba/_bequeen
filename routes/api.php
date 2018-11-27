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
Route::patch('users/update/{id}', 'UserController@update'); 
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
//Item
Route::get('/items', 'ItemController@index');
Route::post('/storeItem/{id}', 'ItemController@store');
Route::patch('items/update/{id}', 'ItemController@update'); 
Route::get('/items/detail/{id}', 'ItemController@showbyID');
Route::delete('/items/delete/{id}', 'ItemController@destroy'); 
//Job
Route::get('/jobs', 'JobController@index');
Route::post('/storeJob', 'JobController@store');
Route::patch('jobs/update/{id}', 'JobController@update'); 
Route::get('/jobs/detail/{id}', 'JobController@showbyID');
Route::delete('/jobs/delete/{id}', 'JobController@destroy'); 

Route::group(['middleware' => 'auth:api'], function(){
    Route::get('/users','UserController@show');
    Route::post('/products','ProductController@index');
    Route::patch('users/{user}','UserController@update');
});

