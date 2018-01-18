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
Route::get('filmshare','PagesController@getfilmshare');
Route::get('createforum','ForumController@createforum');
Route::get('createreview','ReviewsController@create');
Route::get('createcomment','CommentsController@create');
/*Route::get('showreview','ReviewsController@show');
Route::delete('reviews/{id}', ['uses' => 'ReviewsController@destroy', 'as' => 'reviews.destroy']);*/
/*
Route::get('filmshare', function () {
    return view('filmshare');
});
*/
Route::get('/', function () {
    return view('filmshare');
});

Route::get('userprofile', function () {
    return view('userprofile');
});
Route::get('action', function () {
    return view('action');
});
Route::get('comedy', function () {
    return view('comedy');
});
Route::get('romance', function () {
    return view('romance');
});
Route::get('cartoon', function () {
    return view('cartoon');
});
Route::get('other', function () {
    return view('other');
});


Auth::routes();

Route::get('/home', 'HomeController@index');
Route::resource('forums', 'ForumController');
Route::resource('reviews', 'ReviewsController');
Route::resource('comments', 'CommentsController');
