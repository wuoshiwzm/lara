<?php
namespace App\Http\Controllers\Pay;


use App\Http\Controllers\Home\CommonController;
use App\Http\Controllers\Social\WechatController;



class WechatPayController extends WechatController{






  function index(){
    $g = $this->getToken();
    $url = "https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=".$g;



    $arr = [
      "expire_seconds": 604800,
        "action_name"=>"QR_LIMIT_SCENE",
        "action_info"=>["scene"=>["scene_str"=> "123","scene_id"=>123]]
    ];

    $postdata=json_encode($arr);
    $opts = array('http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/x-www-form-urlencoded',
            'content' => $postdata
        )
    );
    $context = stream_context_create($opts);

    $result = file_get_contents($url, false, $context);

    dd($result);


  }


  //
  // http请求方式: POST
  // URL: https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=TOKEN
  // POST数据格式：json
  // POST数据例子：{"action_name": "QR_LIMIT_SCENE", "action_info": {"scene": {"scene_id": 123}}}
  // 或者也可以使用以下POST数据创建字符串形式的二维码参数：
  // {"action_name": "QR_LIMIT_STR_SCENE", "action_info": {"scene": {"scene_str": "123"}}}




}
