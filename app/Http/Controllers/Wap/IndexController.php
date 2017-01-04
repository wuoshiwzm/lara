<?php

namespace App\Http\Controllers\Wap;

use App\Http\Controllers\Social\WechatController;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\SelfMedia;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class IndexController extends WechatController
{

    private $app_id = 'wx260619ea73a4b130';
    private $app_secret = '469536da8d67cd9df2cdde5609ffefaf';


    public function index()
    {
//    dd($this->checkLocation());
    }

    /**
     * @param $latitude
     * @param $longitude
     * 通过地址逆解析得到对应的国家 省份 城市名
     */
    private function getLocation($latitude, $longitude)
    {

/*
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
        $res['country'] = $addrArr->result->addressComponent->country;
        $res['province'] = $addrArr->result->addressComponent->province;
        $res['city'] = $addrArr->result->addressComponent->city;

        return $res;
*/
        $url = 'http://apis.map.qq.com/ws/geocoder/v1/';
        $data = array(
            'location' => $latitude.','.$longitude,
            'key' => 'F2LBZ-3QCKU-BG2VC-4WNDQ-V5KGQ-YWFJF',
        );
        $res = json_decode(requestHttp($url, $data, 0), true);
        $expiretime = time() + 10800;
        if(!isset($_COOKIE['nation']) || !isset($_COOKIE['province']) || !isset($_COOKIE['city']))
        {
            setcookie('nation', $res['result']['address_component']['nation'], $expiretime);
            setcookie('province', $res['result']['address_component']['province'], $expiretime);
            setcookie('city', $res['result']['address_component']['city'], $expiretime);
        }
        return array(
            'country' => $_COOKIE['nation'],
            'province' => $_COOKIE['province'],
            'city' => $_COOKIE['city'],
        );
    }


    public function selfMedia1(){
        //share success and send redpack

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


        return view('wap.self_media1')
            ->with('appid', $this->app_id)
            ->with('timestamp', $timestamp)
            ->with('nonceStr', $nonceStr)
            ->with('signature', $signature);
    }



    public function selfMedia()
    {

        //share success and send redpack

        if(!Session::get('openId')){
            $state = '123';
            $code = '';

            if ($_GET['state'] == $state) {
                $code = $_GET['code'];
                $uinfo = file_get_contents("https://api.weixin.qq.com/sns/oauth2/access_token?appid=" . $this->app_id . "&secret=" . $this->app_secret . "&code=" . $code . "&grant_type=authorization_code");
                $uinfo = (array)json_decode($uinfo);
                $openId = $uinfo['openid'];
                Session::put('openId', $openId);
            }
        }

        else{
            $openId = Session::get('openId');
        }




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
            ->with('appid', $this->app_id)
            ->with('timestamp', $timestamp)
            ->with('nonceStr', $nonceStr)
            ->with('signature', $signature)
            ->with('openId', $openId);
    }

    /**
     *
     */
    public function getContent()
    {


        //根据经纬度获取城市 省份信息

        //纬度
        $latitude = Input::get('latitude');
        //经度
        $longitude = Input::get('longitude');

        $openId = Input::get('openId');

        // -- test only
        // $latitude = 34.301;
        // $longitude = 108.934784;
        // -- test only

        $res = $this->getLocation($latitude, $longitude);

        //返回经过地址过滤的对应数据给手机端 手机端AJAX 调取后处理显示
        $contents = $this->getMedias($res['country'], $res['province'], $res['city'], $latitude, $longitude, $openId);

        //返回json格式数据
        return json_encode($contents);

    }

    /**
     * @param $country
     * @param $province
     * @param $city
     * @return array|bool
     */
    private function getMedias($country, $province, $city, $latitude, $longitude, $openId)
    {
        /*
        //1.the city column is empty and the province column is filled
        // means to check the province
        $self_medias_province = SelfMedia::leftJoin('user', 'self_media.user_id', '=', 'user.user_id')
            ->where('user_balance', '>', 2)
            ->where('media_city', '')
            ->where('media_province', '!=', '')
            ->where('media_province', 'like', '%' . $province . '%')
            ->select('self_media.*')
            ->get();


        //2.the city column is filled and the province column is filled
        //   means the media is tobe checked iwth city and province
        $self_medias_city = SelfMedia::leftJoin('user', 'self_media.user_id', '=', 'user.user_id')
            ->where('user_balance', '>', 2)
            ->where('media_city', '!=', '')
            ->where('media_province', '!=', '')
            ->where('media_province', 'like', '%' . $province . '%')
            ->where('media_city', 'like', '%' . $city . '%')
            ->select('self_media.*')
            ->get();

        //3.the city column is empty and the province column is empty too,
        // means the media is for the whole country to view
        $self_medias_country = SelfMedia::leftJoin('user', 'self_media.user_id', '=', 'user.user_id')
            ->where('user_balance', '>', 2)
            ->where('media_city', '')
            ->where('media_province', '')
            ->select('self_media.*')
            ->get();
        */

        $data['countryNow'] = $country;
        $data['provinceNow'] = $province;
        $data['cityNow'] = $city;
        $data['latNow'] = doubleval($latitude);
        $data['lngNow'] = doubleval($longitude);

        $self_medias_data = SelfMedia::leftJoin('user', 'self_media.user_id', '=', 'user.user_id')
            ->where(function($query) use($data){
                $query->where('media_min_lat', '<=', $data['latNow'])
                    ->where('media_min_lng', '<=', $data['lngNow'])
                    ->where('media_max_lat', '>=', $data['latNow'])
                    ->where('media_max_lng', '>=', $data['lngNow'])
                    ->where('user_balance', '>', 2);
            })
            ->orwhere(function($query) use($data){
                $query->where('media_province', '')
                    ->where('media_city', '')
                    ->where('media_min_lat', 0)
                    ->where('media_min_lng', 0)
                    ->where('media_max_lat', 0)
                    ->where('media_max_lng', 0)
                    ->where('user_balance', '>', 2);
            })
            ->orwhere(function($query) use($data){
                $query->where('media_province', 'like', '%' . $data['provinceNow'] . '%')
                    ->where('media_city', '')
                    ->where('media_min_lat', 0)
                    ->where('media_min_lng', 0)
                    ->where('media_max_lat', 0)
                    ->where('media_max_lng', 0)
                    ->where('user_balance', '>', 2);
            })
            ->orwhere(function($query) use($data){
                $query->where('media_province', 'like', '%' . $data['provinceNow'] . '%')
                    ->where('media_city', 'like', '%' . $data['cityNow'] . '%')
                    ->where('media_min_lat', 0)
                    ->where('media_min_lng', 0)
                    ->where('media_max_lat', 0)
                    ->where('media_max_lng', 0)
                    ->where('user_balance', '>', 2);
            })
            // ->where('user_balance', '>', 2)
            // ->limit(8)
            ->orderby('created_at', 'desc')
            ->select('self_media.*', 'user.user_name')
            ->get();
        $self_medias = $self_medias_data->toArray();

        /*foreach ($self_medias_province as $k => $media) {

            if ($media->share->where('openid', $openId)->count()) {
                $self_medias_province->forget($k);
                continue;
            }

            $media->user_name = $media->user->user_name;
            $media->share_time = $media->share->count();
        }


        foreach ($self_medias_city as $k => $media) {

            if ($media->share->where('openid', $openId)->count()) {
                $self_medias_city->forget($k);
                continue;
            }
            $media->user_name = $media->user->user_name;
            $media->share_time = $media->share->count();
        }

        foreach ($self_medias_country as $k => $media) {

            if ($media->share->where('openid', $openId)->count()) {
                $self_medias_country->forget($k);
                continue;
            }
            $media->user_name = $media->user->user_name;
            $media->share_time = $media->share->count();
        }


        $self_medias = array_merge($self_medias_country->toArray(), $self_medias_city->toArray(), $self_medias_province->toArray());
        $res = $this->arrSort($self_medias, 'created_at', SORT_DESC, SORT_NATURAL);

        return $res;*/

        return $self_medias;

    }


    /**
     * @param $arrays
     * @param $sort_key
     * @param int $sort_order
     * @param int $sort_type
     * @return array|bool
     * 数组排序
     */
    private function arrSort($arrays, $sort_key, $sort_order = SORT_DESC, $sort_type = SORT_NUMERIC)
    {
        if (is_array($arrays)) {
            foreach ($arrays as $array) {
                if (is_array($array)) {
                    $key_arrays[] = $array[$sort_key];
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }

        array_multisort($key_arrays, $sort_order, $sort_type, $arrays);
        return $arrays;
    }


    /**
     * @param $id
     * 显示对应的文章
     * 同样需要地址过滤
     */
    public function show($id)
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


        $content = SelfMedia::find($id);

        return view('wap.content')
            ->with('appid', $this->app_id)
            ->with('timestamp', $timestamp)
            ->with('nonceStr', $nonceStr)
            ->with('signature', $signature)
            ->with('content', $content)
            ->with('media_id', $id);
    }

    public function checkLocation()
    {


        //根据经纬度获取城市 省份信息

        //纬度
        $latitude = Input::get('latitude');
        //经度
        $longitude = Input::get('longitude');
        //文章id
        $mediaId = Input::get('media_id');

        /*$latitude =34.30101;
        $longitude = 108.93479;
        $mediaId = 6;*/

        //获取省份 城市
        $res = $this->getLocation($latitude, $longitude);

        $province = $res['province'];
        $city = $res['city'];

        //对应media_id省份和城市进行检验， 如果可以显示返回true 否则返回false

        $selfMedia = SelfMedia::find($mediaId);
        $provinceRequire = $selfMedia->media_province;
        $cityRequire = $selfMedia->media_city;

        $checkProvince = ($province == $provinceRequire) ? 'true' : 'false';
        $checkCity = ($city == $cityRequire) ? 'true' : 'false';


        if (empty($cityRequire)) {
            if (empty($provinceRequire))
                return 'true';
            return $checkProvince;
        } else {
            return $checkCity;
        }


    }

}
