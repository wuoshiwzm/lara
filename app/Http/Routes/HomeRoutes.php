<?php
//不需要验证的的网页

//首页
Route::get('/','Home\IndexController@index');

//搜索
Route::any('/search','Home\IndexController@search');

//广告分类
Route::get('/cate/{cate_id}','Home\IndexController@cate');
Route::get('/cate','Home\IndexController@dcate');

//设计分类
Route::get('/cate1/{cate_id}','Home\IndexController@cate1');
Route::get('/cate1','Home\IndexController@dcate1');

//策划分类
Route::get('/cate2/{cate_id}','Home\IndexController@cate2');
Route::get('/cate2','Home\IndexController@dcate2');

//自媒体
Route::get('/self_media','Home\SelfMediaController@index');
//自媒体添加
Route::post('/self_media/add','Home\SelfMediaController@add');

//广告资源
Route::get('/a/{art_id}','Home\IndexController@article');
//设计资源
Route::get('/a1/{art_id}','Home\IndexController@article1');
//策划资源
Route::get('/a2/{art_id}','Home\IndexController@article2');


//新闻总条目 & 新闻内容
Route::get('/news_all','Home\IndexController@newsAll');
Route::get('/news/{news_id}','Home\IndexController@news');

//求购总条目 & 求购资源
Route::get('/offer_all','Home\IndexController@offerAll');
Route::get('/offer/{offer_id}','Home\IndexController@offer');

//管理员登录
Route::any('admin/login', 'Admin\LoginController@login');
// Route::any('member/ajax_login', 'Member\LoginController@ajaxLogin');
Route::get('admin/code', 'Admin\LoginController@code');

//会员登录
Route::any('member/login', 'Member\MemberLoginController@login');
Route::any('member/ajax_login', 'Member\MemberLoginController@ajaxLogin');
// Route::get('member/code', 'Member\MemberLoginController@code');

//分享
Route::get('share/{media_id}','Social\ShareController@index');
Route::get('share2/{media_id}','Social\ShareController@index2');
Route::get('sharecontent/{media_id}','Social\ShareController@content');
Route::get('sharesuccess/{media_id}','Social\ShareController@sharesuccess');


//need ajax here, so method is 'any'
Route::any('share/content','Social\ShareController@content');
Route::any('testpay','Pay\WechatPayController@index');

//register
Route::resource('register','Home\RegisterController');

//服务条款
Route::resource('/protocal','Home\IndexController@protocal');

//关于我们
Route::resource('/about','Home\IndexController@about');


//wx pay Route 回调函数
// Route::get('hongbao','Pay\Wx\Hongbao\HongbaoController@index');
// Route::get('scanpay','Pay\Wx\Scanpay\ScanpayController@index');
// Route::get('scanpay_callback','Pay\Wx\Scanpay\ScanpayController@callback');
Route::any('scanpay_callback','Pay\Wx\Scanpay\NotifyController@index');

//上传图片
Route::any('upload', 'Admin\CommonController@upload');

//ajax获取用户余额
Route::any('member/ajaxgetbalance','Member\MemberIndexController@ajaxgetbalance');

//用户验证
Route::get('/forgotpass','Home\MemberVerifyController@forgotpass');
Route::get('/verifyuser','Home\MemberVerifyController@verifyuser');
Route::get('/resetpass/{flagcode}','Home\MemberVerifyController@resetpass');
Route::any('/ajaxresetpass','Home\MemberVerifyController@ajaxresetpass');
