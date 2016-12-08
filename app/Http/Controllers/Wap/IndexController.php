<?php

namespace App\Http\Controllers\Wap;

use App\Http\Controllers\Social\WechatController;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\SelfMedia;
use Illuminate\Support\Facades\Input;

class IndexController extends WechatController
{

    private $appid = 'wx260619ea73a4b130';
    private $secret = '469536da8d67cd9df2cdde5609ffefaf';

    public function index()
    {

    }

    public function selfMedia()
    {

        //微信获取地址接口

        //获取 access_token
        $access_token = $this->getToken();
        $nonceStr = $this->getRandStr(15);
        $timestamp = time();
        $url = 'https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=' . $access_token . '&type=jsapi';

        //获取 ticket
        $ret_json = file_get_contents($url);
        $ret = json_decode($ret_json);
        if ($ret->errcode != 0) {
            $access_token = $this->getTokenAnyway();
            $noncestr = $this->getRandStr(15);
            $timestamp = time();
            $url = 'https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=' . $access_token . '&type=jsapi';
            $ret_json = file_get_contents($url);
            $ret = json_decode($ret_json);
        }

        //获取签名
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        $string = "jsapi_ticket=$ret->ticket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";
        $signature = sha1($string);

        return view('wap.self_media')
            ->with('appid', $this->appid)
            ->with('timestamp', $timestamp)
            ->with('nonceStr', $nonceStr)
            ->with('signature', $signature);
    }

    public function getAddress()
    {
        //根据经纬度获取城市 省份信息

        //纬度
        $latitude = Input::get('latitude');
        //经度
        $longitude = Input::get('longitude');

        $url =
        "http://api.map.baidu.com/geocoder/v2/?ak=mNFudz5LlDPFHRo9B4yWgG06vpkovvET&coordtype=wgs84ll&callback=renderReverse&location="
        . $latitude . "," . $longitude . "&output=json&pois=0";

        return result = file_get_contents($url);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //如果把这行注释掉的话，就会直接输出
        $result=curl_exec($ch);
        curl_close($ch);

        return $result;



    }


}
