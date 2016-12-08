<?php
/**
 * Created by PhpStorm.
 * User: wuosh
 * Date: 2016/12/7
 * Time: 14:44
 */

//首页
Route::get('/','IndexController@index');

//自媒体
Route::get('/self_media','IndexController@selfMedia');

//自媒体 地址经纬度获取并更新对应数据
Route::any('/self_media/get_address','IndexController@getAddress');
