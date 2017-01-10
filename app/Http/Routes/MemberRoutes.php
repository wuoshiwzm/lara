<?php
//会员的路由
//Route::group(['middleware' => ['admin.login'],'prefix'=>'member','namespace'=>'Member'], function () {
//登录页面
Route::get('/', 'MemberIndexController@index');
Route::get('info', 'MemberIndexController@info');
Route::get('quit', 'MemberLoginController@quit');
Route::any('pass', 'MemberIndexController@pass');


//资源信息 - 广告
Route::resource('article','MemberArticleController');
Route::any('article/cre/{cate_id}','MemberArticleController@cre');

//资源信息 - 设计
Route::resource('article1','MemberArticleController1');
Route::any('article1/cre/{cate_id}','MemberArticleController1@cre');

//资源信息 - 策划
Route::resource('article2','MemberArticleController2');
Route::any('article2/cre/{cate_id}','MemberArticleController2@cre');

//求购管理
Route::resource('offer','MemberOfferController');
Route::any('offer/changeorder', 'MemberOfferController@changeOrder');

//新闻管理
Route::resource('news','MemberNewsController');
Route::any('news/changeorder', 'MemberNewsController@changeOrder');

//公司信息
Route::resource('company','CompanyController');
Route::any('upload', 'CommonController@upload');


Route::get('myinfo', 'MemberIndexController@myinfo');
Route::get('editmyinfo', 'MemberIndexController@editmyinfo');
Route::any('ajaxuploadheader', 'MemberIndexController@ajaxuploadheader');


//自媒体
Route::resource('self_media','MemberSelfMediaController');
