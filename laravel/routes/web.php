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

Route::get('/', 'Auth\PostController@showTopPage')->name('top');
Route::get('/search', 'Auth\PostController@search')->name('search');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/drafts/new', 'Auth\PostController@index')->name('drafts.new');
Route::post('/drafts/new', 'Auth\PostController@postArticle')->name('drafts.new.posts');

Route::get('/drafts/{id}', 'Auth\PostController@showArticle')->name('item');

Route::post('/drafts/{id}/likes', 'LikesController@store');
Route::post('/drafts/{id}/likes/{like}', 'LikesController@destroy');