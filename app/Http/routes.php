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

    Route::get('/cate/{cate_id}','Home\IndexController@cate');
    Route::get('/cate','Home\IndexController@dcate');
    Route::get('/cate1/{cate_id}','Home\IndexController@cate1');
    Route::get('/cate1','Home\IndexController@dcate1');
    Route::get('/cate2/{cate_id}','Home\IndexController@cate2');
    Route::get('/cate2','Home\IndexController@dcate2');
    Route::get('/self_media','Home\SelfMediaController@index');
    Route::post('/self_media/add','Home\SelfMediaController@add');


    Route::get('/a/{art_id}','Home\IndexController@article');
    Route::get('/a1/{art_id}','Home\IndexController@article1');
    Route::get('/a2/{art_id}','Home\IndexController@article2');
    Route::any('admin/login', 'Admin\LoginController@login');
    Route::get('admin/code', 'Admin\LoginController@code');


    //share function
    Route::get('share/{media_id}','Social\ShareController@index');
    Route::get('share2/{media_id}','Social\ShareController@index2');
    Route::get('sharecontent/{media_id}','Social\ShareController@content');
    Route::get('sharesuccess/{media_id}','Social\ShareController@sharesuccess');


    //need ajax here, so method is 'any'
    Route::any('share/content','Social\ShareController@content');
    Route::any('testpay','Pay\WechatPayController@index');

    //register
    Route::resource('register','Home\RegisterController');


    //wx pay Route
    // Route::get('hongbao','Pay\Wx\Hongbao\HongbaoController@index');
    // Route::get('scanpay','Pay\Wx\Scanpay\ScanpayController@index');
    // Route::get('scanpay_callback','Pay\Wx\Scanpay\ScanpayController@callback');
    Route::any('scanpay_callback890707asd89asdfasd897asd897jkjkzxcuioqwejkr89','Pay\Wx\Scanpay\NotifyController@index');

    // Route::get('scanpaytest','Pay\Wx\Scanpay\native.php');

    Route::any('upload', 'Admin\CommonController@upload');

});


//for the administraters login
Route::group(['middleware' => ['boss.login']], function () {

});


//pay payments
Route::group(['middleware' => ['admin.login']], function () {
  Route::get('scanpay','Pay\Wx\Scanpay\ScanpayController@index');
  Route::any('set_payment','Pay\Wx\Scanpay\ScanpayController@setPayment');
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

    //主页面大横幅
    Route::any('mpic/changeorder', 'MpicController@changeOrder');
    Route::resource('mpic','MpicController');

    //主页面小横幅
    Route::any('spic/changeorder', 'SpicController@changeOrder');
    Route::resource('spic','SpicController');

    Route::any('config/putfile', 'ConfigController@putFile');
    Route::any('config/changeorder', 'ConfigController@changeOrder');
    Route::any('config/changecontent', 'ConfigController@changeContent');
    Route::resource('config','ConfigController');



    // Route::resource('media','MediaController');

  });
