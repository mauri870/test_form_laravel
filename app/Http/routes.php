<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('form',['as'=>'form', function () {
    return view('form');
}]);

Route::post('form',['as'=>'form_post', 'uses'=>'PagesController@form']);

Route::get('list_posts',['as'=>'list_post', 'uses'=>'PagesController@list_posts']);

Route::get('posts/{id}',['as'=>'posts', 'uses'=>'PagesController@post']);
