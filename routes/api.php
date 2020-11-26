<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('home_hotel_north', 'Api\HomeController@get_home_hotel_north');
Route::get('home_hotel_central', 'Api\HomeController@get_home_hotel_central');
Route::get('home_hotel_south', 'Api\HomeController@get_home_hotel_south');
Route::POST('home_all_hotel_north', 'Api\HomeController@post_home_all_hotel_north');

Route::post('login','Api\HomeController@postLogin');
Route::POST('register','Api\HomeController@postRegister');

Route::post('person','Api\HomeController@person');

Route::POST('des_hotel', 'Api\HotelController@post_des_hotel');
Route::POST('des_room', 'Api\RoomController@post_des_room');
Route::POST('search', 'Api\RoomController@post_search');
Route::POST('allroom', 'Api\RoomController@post_all_room');

Route::POST('booking', 'Api\BillController@post_booking');
Route::POST('addbill', 'Api\BillController@post_addbill');

Route::POST('billofme', 'Api\PersonController@post_billofme');
Route::POST('listbillofme', 'Api\PersonController@post_listbillofme');

Route::POST('addcomment', 'Api\RoomController@post_addcomment');
Route::POST('listcomment', 'Api\RoomController@post_listcomment');

