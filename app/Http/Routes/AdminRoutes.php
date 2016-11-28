<?php
//管理员路由
//['middleware' => ['boss.login'], 'prefix'=>'admin', 'namespace'=>'Admin'

//登录页面
Route::get('/', 'IndexController@index');
Route::get('info', 'IndexController@info');
Route::get('quit', 'LoginController@quit');
Route::any('pass', 'IndexController@pass');


//设置分类信息 - 广告
Route::any('cate/changeorder', 'CategoryController@changeOrder');
Route::any('cate/changearticleadd', 'CategoryController@changearticleadd');
Route::resource('category','CategoryController');

//资源信息 - 广告
Route::resource('article','ArticleController');
Route::any('article/cre/{cate_id}','ArticleController@cre');

//设置分类信息 - 设计
Route::any('cate1/changeorder', 'CategoryController1@changeOrder');
Route::any('cate1/changearticleadd', 'CategoryController1@changearticleadd');
Route::resource('category1','CategoryController1');

//资源信息 - 设计
Route::resource('article1','ArticleController1');
Route::any('article1/cre/{cate_id}','ArticleController1@cre');

//设置分类信息 - 策划
Route::any('cate2/changeorder', 'CategoryController2@changeOrder');
Route::any('cate2/changearticleadd', 'CategoryController2@changearticleadd');
Route::resource('category2','CategoryController2');
//资源信息 - 策划
Route::resource('article2','ArticleController2');
Route::any('article2/cre/{cate_id}','ArticleController2@cre');

//友情链接
Route::any('links/changeorder', 'LinksController@changeOrder');
Route::resource('links','LinksController');

//导航
Route::any('navs/changeorder', 'NavsController@changeOrder');
Route::resource('navs','NavsController');

//主页面大横幅后台设置
Route::any('mpic/changeorder', 'MpicController@changeOrder');
Route::resource('mpic','MpicController');

//主页面小横幅后台设置
Route::any('spic/changeorder', 'SpicController@changeOrder');
Route::resource('spic','SpicController');

//其他页面横幅
Route::any('page_banner/changeorder', 'PageBannerController@changeOrder');
Route::resource('page_banner','PageBannerController');

//主页面主流媒体后台设置
Route::any('main_media/changeorder', 'MainMediaController@changeOrder');
Route::resource('main_media','MainMediaController');

//精品推荐
Route::resource('recm','RecmommendController');
Route::any('recm/changeorder', 'RecmommendController@changeOrder');

//设计推荐
Route::resource('recm1','RecmommendController1');
Route::any('recm1/changeorder', 'RecmommendController1@changeOrder');

//自媒体
Route::resource('self_media','SelfMediaController');

//求购管理
Route::resource('offer','OfferController');
Route::any('offer/changeorder', 'OfferController@changeOrder');

// //公司信息
// Route::resource('company','CompanyController');
// Route::any('upload', 'CommonController@upload');

//自媒体
Route::resource('self_media','SelfMediaController');

//新闻管理
Route::resource('news','NewsController');
Route::any('news/changeorder', 'NewsController@changeOrder');
