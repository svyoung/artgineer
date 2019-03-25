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

Route::get('/', function () {
    return view('main.index');
});

Route::get('/resume', 'ResumeController@index');


Route::get('/home', 'HomeController@index');

Route::get('/get_posts', 'HomeController@getPosts');

Auth::routes();

// opening up new post modal
Route::get('/new', 'HomeController@newPost');

// submit new post data
Route::post('/addnewpost', 'PostsController@add');

// update existing post
Route::post('/updatepost', 'PostsController@update');

// delete existing post
Route::post('/deletepost', 'PostsController@delete');

// read full post
Route::get('/post/{id}', 'PostsController@fullpost');

// search posts
Route::get('/searchposts', 'PostsController@search');

Route::get('/about', 'HomeController@about');

//Route::get('/resume', 'HomeController@resume');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
