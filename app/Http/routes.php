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


    Route::get('/','Home\SelfMediaController@index');
    Route::get('test','Home\SupplierController@index');
    // Route::get('check','Home\SelfMediaController@index');




    // Route::get('/cate/{cate_id}','Home\IndexController@cate');
    Route::get('/cate/{cate_id}','Home\IndexController@cate');
    Route::get('/cate1/{cate_id}','Home\IndexController@cate1');
    Route::get('/cate2/{cate_id}','Home\IndexController@cate2');
    Route::get('/self_media','Home\SelfMediaController@index');
    Route::post('/self_media/add','Home\SelfMediaController@add');


    Route::get('/a/{art_id}','Home\IndexController@article');
    Route::any('admin/login', 'Admin\LoginController@login');
    Route::get('admin/code', 'Admin\LoginController@code');


    //share function
    Route::get('share','Social\ShareController@index');
    Route::get('share2','Social\ShareController@index2');

    //need ajax here, so method is 'any'
    Route::any('share/content','Social\ShareController@content');
    Route::any('testpay','Pay\WechatPayController@index');

    //register
    Route::resource('register','Home\RegisterController');

    Route::any('upload', 'Admin\CommonController@upload');

});





Route::group(['middleware' => ['admin.login'],'prefix'=>'admin','namespace'=>'Admin'], function () {
    Route::get('/', 'IndexController@index');
    Route::get('info', 'IndexController@info');
    Route::get('quit', 'LoginController@quit');
    Route::any('pass', 'IndexController@pass');

    //register user



    Route::any('cate/changeorder', 'CategoryController@changeOrder');
    Route::any('cate/changearticleadd', 'CategoryController@changearticleadd');
    Route::resource('category','CategoryController');
    Route::resource('article','ArticleController');
    Route::any('article/cre/{cate_id}','ArticleController@cre');


    Route::any('cate1/changeorder', 'CategoryController1@changeOrder');
    Route::any('cate1/changearticleadd', 'CategoryController1@changearticleadd');
    Route::resource('category1','CategoryController1');
    Route::resource('article1','ArticleController1');
    Route::any('article1/cre/{cate_id}','ArticleController1@cre');

    Route::any('cate2/changeorder', 'CategoryController2@changeOrder');
    Route::any('cate2/changearticleadd', 'CategoryController2@changearticleadd');
    Route::resource('category2','CategoryController2');
    Route::resource('article2','ArticleController2');
    Route::any('article2/cre/{cate_id}','ArticleController2@cre');

    Route::resource('company','CompanyController');
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



    Route::resource('media','MediaController');

  });
