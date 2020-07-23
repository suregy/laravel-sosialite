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

if(App::environment('production'))
{
    URL::forceScheme('https');
}

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tweet', function()
{
    //return Twitter::getUserTimeline(array('screen_name' => 'suhegy', 'count' => 20, 'format' => 'json'));
    return Twitter::postTweet(array('status' => 'http://localhost:8000/12', 'format' => 'json'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('auth/facebook', 'Auth\FacebookController@redirectToFacebook');
Route::get('auth/facebook/callback', 'Auth\FacebookController@handleFacebookCallback');
Route::get('auth/twitter', 'Auth\TwitterController@redirectToTwitter');
Route::get('auth/twitter/callback', 'Auth\TwitterController@handleTwitterCallback');
Route::group(['middleware' => ['auth']], function(){
    Route::get('/user', 'GraphController@retrieveUserProfile');
    Route::post('/user', 'GraphController@publishToProfile');
});

Route::resource('/pagination', 'PaginationController');
Route::post('pagination', 'PaginationController@main');
Route::post('pagination_store', 'PaginationController@store');

Route::resource('/destinasi', 'DestinasiController');
Route::post('destinasi_store', 'DestinasiController@store');

Route::resource('/bus', 'BusController');
Route::post('bus_store', 'BusController@store');

Route::resource('/trip', 'TripController');
Route::post('trip_store', 'TripController@store');

