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
Route::auth();

Route::group(['as' => 'home.'], function () {
    Route::group([
//        'middleware' => 'guest',
        'namespace' => 'Panel',
    ], function () {
        Route::post('/create', ['as' => 'postCreate', 'uses' => 'TicketController@postGuestCreate']);
        Route::get('/contactUs', ['as' => 'getContactUs', 'uses' => 'TicketController@getContactUs']);
        Route::post('/reply/{email}/{id}', ['as' => 'postReply', 'uses' => 'TicketController@postGuestReply']);
        Route::get('/reply/{email}/{id}', ['as' => 'getReply', 'uses' => 'TicketController@getGuestReply']);
        Route::post('/find', ['as' => 'postFind', 'uses' => 'TicketController@postFind']);
        Route::get('/search', ['as' => 'getSearch', 'uses' => 'TicketController@getSearch']);
        Route::post('/close/{id}', ['as' => 'postClose', 'uses' => 'TicketController@postGuestClose']);
    });
});


Route::get('/home', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');
