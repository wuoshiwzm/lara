<?php




//手机端路由
Route::group(['middleware' => [], 'prefix' => 'wap', 'namespace' => 'Wap'], function () {
    require(__DIR__ . '/Routes/WapRoutes.php');
});



//管理员路由
Route::group(['middleware' => ['boss.login'], 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
    require(__DIR__ . '/Routes/AdminRoutes.php');
});




//会员的路由
Route::group(['middleware' => ['admin.login']], function () {
    //付款
    Route::get('scanpay', 'Pay\Wx\Scanpay\ScanpayController@index');
    Route::any('set_payment', 'Pay\Wx\Scanpay\ScanpayController@setPayment');
    Route::any('admin/upload', 'Admin\CommonController@upload');
});

Route::group(['middleware' => ['admin.login'], 'prefix' => 'member', 'namespace' => 'Member'], function () {
    require(__DIR__ . '/Routes/MemberRoutes.php');

    //设置
    Route::any('config/putfile', 'ConfigController@putFile');
    Route::any('config/changeorder', 'ConfigController@changeOrder');
    Route::any('config/changecontent', 'ConfigController@changeContent');
    Route::resource('config', 'ConfigController');


    // Route::resource('media','MediaController');

});



//前端  -  不需要验证的的网页
Route::group(['middleware' => []], function () {
    require(__DIR__ . '/Routes/HomeRoutes.php');
});
