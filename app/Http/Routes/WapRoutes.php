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