<?php
define('PI',3.1415926535898); //圆周率

/*
 * 获取客户端IP
*/
function getIp(){ 
    $onlineip=''; 
    if(getenv('HTTP_CLIENT_IP')&&strcasecmp(getenv('HTTP_CLIENT_IP'),'unknown')){ 
        $onlineip=getenv('HTTP_CLIENT_IP'); 
    } elseif(getenv('HTTP_X_FORWARDED_FOR')&&strcasecmp(getenv('HTTP_X_FORWARDED_FOR'),'unknown')){ 
        $onlineip=getenv('HTTP_X_FORWARDED_FOR'); 
    } elseif(getenv('REMOTE_ADDR')&&strcasecmp(getenv('REMOTE_ADDR'),'unknown')){ 
        $onlineip=getenv('REMOTE_ADDR'); 
    } elseif(isset($_SERVER['REMOTE_ADDR'])&&$_SERVER['REMOTE_ADDR']&&strcasecmp($_SERVER['REMOTE_ADDR'],'unknown')){ 
        $onlineip=$_SERVER['REMOTE_ADDR']; 
    } 
    return $onlineip; 
}

/*
 * 用户IP转化为腾讯地图坐标
 * @param string $url 请求地址
 * @param array $params 请求参数
 * @param int $ispost 请求方式 1-post 0-get
 * @param int $isssl 是否https请求 1-是 0-否
*/
function requestHttp($url, $params=array(), $ispost=1, $isssl=0){
    if(is_array($params))
    {
        $url .= '?'.http_build_query($params);
    }
    else
    {
        $paramsstr = $params;
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    if($ispost)
    {
        curl_setopt($ch, CURLOPT_POST, $ispost);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $paramsstr);
    }
    if($isssl)
    {
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); 
    }
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

/*
 * 用户IP转化为腾讯地图坐标
*/
function getTencentMapLocation($clientip = ''){
    if(!empty($clientip) && $clientip != '127.0.0.1')
        $data['ip'] = $clientip;
    $data['key'] = 'SVZBZ-HVORO-QDLWY-SYLMU-Y6P52-EIBQL';
    $res = requestHttp('http://apis.map.qq.com/ws/location/v1/ip',$data,0);
    return $res;
}

/*
 * 计算坐标范围范围
 * @param double $lat 纬度
 * @param double $lon 经度
 * @param double $raidus 距离(米)
*/
function getRange($lat,$lon,$raidus){
    //计算纬度
    $degree = (24901 * 1609) / 360.0;
    $dpmLat = 1 / $degree; 
    $radiusLat = $dpmLat * $raidus;
    $minLat = $lat - $radiusLat; //得到最小纬度
    $maxLat = $lat + $radiusLat; //得到最大纬度     
    //计算经度
    $mpdLng = $degree * cos($lat * (PI / 180));
    $dpmLng = 1 / $mpdLng;
    $radiusLng = $dpmLng * $raidus;
    $minLng = $lon - $radiusLng;  //得到最小经度
    $maxLng = $lon + $radiusLng;  //得到最大经度
    //范围
    $range = array(
        'minLat' => $minLat,
        'maxLat' => $maxLat,
        'minLon' => $minLng,
        'maxLon' => $maxLng
    );
    return $range;
}

//生成随机字符串
function random($length=6, $type='string', $convert=0){
    $config = array(
        'number'=>'1234567890',
        'letter'=>'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
        'string'=>'abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ23456789',
        'all'=>'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'
    );

    if(!isset($config[$type])) $type = 'string';
    $string = $config[$type];

    $code = '';
    $strlen = strlen($string) -1;
    for($i = 0; $i < $length; $i++){
        $code .= $string{mt_rand(0, $strlen)};
    }
    if(!empty($convert)){
        $code = ($convert > 0)? strtoupper($code) : strtolower($code);
    }
    return $code;
}

//smtp发送邮件
function sendEmailToOne($toemail, $subjecttxt, $emailtxt)
{
    require_once('AliEmail.class.php');
    require_once('email.class.php');
    return AliEmail::sendEmailBySMTP($toemail, $subjecttxt, $emailtxt);
}