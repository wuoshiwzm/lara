<?php
//不需要验证的的网页

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

//管理员登录
Route::any('admin/login', 'Admin\LoginController@login');
// Route::any('member/ajax_login', 'Member\LoginController@ajaxLogin');
Route::get('admin/code', 'Admin\LoginController@code');

//会员登录
Route::any('member/login', 'Member\MemberLoginController@login');
Route::any('member/ajax_login', 'Member\MemberLoginController@ajaxLogin');
// Route::get('member/code', 'Member\MemberLoginController@code');

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
