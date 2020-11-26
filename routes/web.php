<?php

use Illuminate\Support\Facades\Route;
Route::get('admin/login', [ 'as' => 'login', 'uses' => 'Admin\LoginController@getLogin']);
Route::post('admin/login', [ 'as' => 'login', 'uses' => 'Admin\LoginController@postLogin']);
Route::get('admin/logout', [ 'as' => 'logout', 'uses' => 'Admin\LoginController@Logout']);
Route::get('admin/trangchu','Admin\HomeController@index');
//Quản lý trong Admin
Route::get('admin/dskhachsan','Admin\ManageController@dskhachsan');
Route::get('admin/dsphong','Admin\ManageController@dsphong');
Route::get('admin/dskhachhang','Admin\ManageController@dskhachhang');
Route::get('admin/tkloinhuan','Admin\ManageController@tkloinhuan');
Route::get('admin/checkout','Admin\ManageController@checkout');
Route::get('admin/dskhachsan/{ID_Area}','Admin\ManageController@dskhachsan_khuvuc');
Route::get('admin/dsphong/{ID_Hotel}','Admin\ManageController@dsphong_khachsan');
Route::get('admin/tkloinhuan','Admin\ManageController@getloinhuan');
Route::post('admin/tkloinhuan','Admin\ManageController@postloinhuan');
Route::get('admin/checkout','Admin\ManageController@checkout');
//edit
Route::get('admin/themdskhachsan','Admin\EditController@getthemdskhachsan');
Route::post('admin/themdskhachsan','Admin\EditController@postthemdskhachsan');
Route::get('admin/xoadskhachsan/{ID_Hotel}','Admin\EditController@xoadskhachsan');
Route::get('admin/suadskhachsan/{ID_Hotel}','Admin\EditController@getsuadskhachsan');
Route::post('admin/suadskhachsan/{ID_Hotel}','Admin\EditController@postsuadskhachsan');

Route::get('admin/themdsphong','Admin\EditController@getthemdsphong');
Route::post('admin/themdsphong','Admin\EditController@postthemdsphong');
Route::get('admin/xoadsphong/{ID_Room}','Admin\EditController@xoadsphong');
Route::get('admin/suadsphong/{ID_Room}','Admin\EditController@getsuadsphong');
Route::post('admin/suadsphong/{ID_Room}','Admin\EditController@postsuadsphong');

Route::get('admin/xoadskhachhang/{ID_User}','Admin\EditController@xoadskhachhang');

Route::get('admin/xoacheckout/{ID_Bill}','Admin\EditController@xoacheckout');
Route::get('admin/suacheckout/{ID_Bill}','Admin\EditController@getsuacheckout');
Route::post('admin/suacheckout/{ID_Bill}','Admin\EditController@postsuacheckout');

Route::get('admin/suabill/{ID_Bill}','Admin\EditController@getsuabill');
Route::post('admin/suabill/{ID_Bill}','Admin\EditController@postsuabill');