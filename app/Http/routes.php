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
Route::group(['middleware' => []], function () {


    Route::get('/','Home\IndexController@index');




    // Route::get('/cate/{cate_id}','Home\IndexController@cate');
    Route::get('/cate/{cate_id}','Home\IndexController@cate');
    Route::get('/self_media','Home\SelfMediaController@index');
    Route::post('/self_media/add','Home\SelfMediaController@add');


    Route::get('/a/{art_id}','Home\IndexController@article');
    Route::any('admin/login', 'Admin\LoginController@login');
    Route::get('admin/code', 'Admin\LoginController@code');


    //share function
    Route::get('share','Social\ShareController@index');
    //need ajax here, so method is 'any'
    Route::any('share/content','Social\ShareController@content');

    Route::any('testpay','Pay\WechatPayController@index');

});





Route::group(['middleware' => ['admin.login'],'prefix'=>'admin','namespace'=>'Admin'], function () {
    Route::get('/', 'IndexController@index');
    Route::get('info', 'IndexController@info');
    Route::get('quit', 'LoginController@quit');
    Route::any('pass', 'IndexController@pass');

    Route::any('cate/changeorder', 'CategoryController@changeOrder');
    Route::resource('category','CategoryController');
    Route::resource('article','ArticleController');
    Route::any('upload', 'CommonController@upload');

    Route::resource('self_media','SelfMediaController');

    Route::any('links/changeorder', 'LinksController@changeOrder');
    Route::resource('links','LinksController');

    Route::any('navs/changeorder', 'NavsController@changeOrder');
    Route::resource('navs','NavsController');

    Route::any('config/putfile', 'ConfigController@putFile');
    Route::any('config/changeorder', 'ConfigController@changeOrder');
    Route::any('config/changecontent', 'ConfigController@changeContent');
    Route::resource('config','ConfigController');

    // Route::resource('self_media','SelfMediaController');
  });





//Route::any('admin/info', 'Admin\IndexController@info');






//Route::get('admin/code','Admin\LoginController@code');
//Route::any('admin','Admin\LoginController@index');
