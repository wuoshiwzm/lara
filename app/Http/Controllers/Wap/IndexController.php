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

        // -- test only
//        $latitude = 34.301;
//        $longitude = 108.934784;
        // -- test only

        $url = "http://api.map.baidu.com/geocoder/v2/?callback=renderReverse&location="
            . $latitude . "," . $longitude . "&output=json&pois=1&ak=QbFPEt2GiMZ9I4e8zlVXPwjnVrClfNxO";


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //如果把这行注释掉的话，就会直接输出
        $result = curl_exec($ch);
        curl_close($ch);

        // 百度地图返回JSON数据：
        //renderReverse&&renderReverse({
        //"status":0, "result":
        //{
        //"location":
        //{
        //"lng":108.93478399999994, "lat":34.30100002648598
        //}, "formatted_address":"陕西省西安市未央区龙首北路西段","business":"未央路沿线","addressComponent":{
        //    "country":"中国","country_code":0,"province":"陕西省","city":"西安市","district":"未央区","adcode":"610112","street":"龙首北路西段","street_number":"","direction":"","distance":""},"pois":[{
        //    "addr":"朱宏路与纬二十六街交汇处向东200米","cp":"","direction":"内","distance":"0","name":"福安花园","poiType":"房地产","point":{
        //        "x":108.93211934214675,"y":34.300107993433289},"tag":"房地产","tel":"","uid":"f5d76f56e567bf44eddfca90","zip":""},{
        //    "addr":"陕西省西安市未央区福安花园小区16栋","cp":" ","direction":"东南","distance":"80","name":"福安花园16号楼","poiType":"房地产","point":{
        //        "x":108.93439205508699,"y":34.30150213946212},"tag":"房地产;住宅区","tel":"","uid":"938dbdc531e2bb6be01103fb","zip":""},{
        //    "addr":"家香菜馆附近","cp":" ","direction":"东北","distance":"159","name":"马泘沱村(馨鑫嘉园东)","poiType":"房地产","point":{
        //        "x":108.9334757834668,"y":34.300510583454997},"tag":"房地产;住宅区","tel":"","uid":"7d4a6964ec2dad6a48cc4ae0","zip":""},{
        //    "addr":"龙首北路纬二十六街59号","cp":" ","direction":"北","distance":"285","name":"西安未央正泰医院","poiType":"医疗","point":{
        //        "x":108.93538917420307,"y":34.29893003366547},"tag":"医疗;综合医院","tel":"","uid":"c8e8f633e507a36fab0dd871","zip":""},{
        //    "addr":"城北龙首北路西段150号（纬二十六街与永兴路西南角)","cp":" ","direction":"北","distance":"343","name":"皇族名居","poiType":"房地产","point":{
        //        "x":108.9340596820483,"y":34.29851252493568},"tag":"房地产;住宅区","tel":"","uid":"db1f39d4f6ec7d6cf5c59c70","zip":""},{
        //    "addr":"城北纬二十六街与永新路交汇处西南角","cp":" ","direction":"西北","distance":"362","name":"天赐苑","poiType":"房地产","point":{
        //        "x":108.93629646276814,"y":34.29860944679177},"tag":"房地产;住宅区","tel":"","uid":"1020060f313cbca51894c673","zip":""},{
        //    "addr":"明光路与纬二十六街十字向北500米路西,阳光北郡北区","cp":" ","direction":"西南","distance":"287","name":"安吉阳光北郡幼儿园","poiType":"教育培训","point":{
        //        "x":108.93696120884553,"y":34.302150744894529},"tag":"教育培训;幼儿园","tel":"","uid":"a3d5410000c349fd41e1926b","zip":""},{
        //    "addr":"永兴路与龙首北路西段交汇处往西100米","cp":" ","direction":"北","distance":"338","name":"好家人超市","poiType":"购物","point":{
        //        "x":108.93415849565439,"y":34.29852743599782},"tag":"购物;超市","tel":"","uid":"b1235044e6e3f72d5fbe8614","zip":""},{
        //    "addr":"西安市未央区龙首北路154号(近马泘沱村鸵鸟王大厦)","cp":" ","direction":"东北","distance":"399","name":"陕西中医肝肾病医院","poiType":"医疗","point":{
        //        "x":108.93290985099553,"y":34.298460336197198},"tag":"医疗;综合医院","tel":"","uid":"550fd5f974459860921fc9ad","zip":""},{
        //    "addr":"西安市未央区明光路纬26街天竹综合大厦一层","cp":" ","direction":"西北","distance":"518","name":"中国光大银行(明光路支行)","poiType":"金融","point":{
        //        "x":108.93873087070019,"y":34.29895240014545},"tag":"金融;银行","tel":"","uid":"df159e1656c66d5b8bb98805","zip":""}],"poiRegions":[{
        //    "direction_desc":"内","name":"福安花园","tag":"房地产"}],"sematic_description":"福安花园内","cityCode":233}}
        //    )

        $addrJson = substr($result, strlen('renderReverse&&renderReverse('), -1);
        $addrArr = json_decode($addrJson);
        $country = $addrArr->result->addressComponent->country;
        $province = $addrArr->result->addressComponent->province;
        $city = $addrArr->result->addressComponent->city;


//        dd($addrArr->result->addressComponent);


        return $city;

    }

    public function test()
    {
        return view('wap.test');
    }


}
