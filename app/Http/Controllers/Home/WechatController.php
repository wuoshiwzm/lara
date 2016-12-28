<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Model\Data;
use App\Http\Requests;
use App\Http\Controllers\Home\CommonController;

class WechatController extends CommonController{


  private $appid='wx65dabb801b9106ee';
  private $secret = '7def82058bb02bc9c37eba828ba74b6c';

  private function getRandStr($num){
    $chars='qwertyuiopasdfghjklzxcvbnm1234567890QWERTYUIOPASDFGHJKLZXCVBNM';
    $pass ='';
    for($i=0;$i<$num;$i++){
      $pass.=substr($chars,mt_rand(0,(strlen($chars))),1);
    }
    return $pass;
  }


  public function getToken(){
    //get token
    $url_token ="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$this->appid&secret=$this->secret";
    // echo $url_token;
    // exit();
    //get the ACCESS TOKEN by each 7000ms
    // echo $url_token;
    $timeNow = time();
    $tokenData = Data::where('data_name','access_token')->orderBy('created_at','desc')->first();
    // dd($timeNow - $tokenData->created_at->getTimeStamp());
    if (($timeNow - $tokenData->created_at->getTimeStamp())>3000)
    {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url_token);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    $data['data_name']='access_token';
    $output = json_decode($output);
    $data['data']=$output->access_token;
    // dd($data);
    Data::create($data);
    return $output->access_token;
  }else{
    return $tokenData->data;
  }
  }

  public function wechat_data(){

    $access_token = $this->getToken();

    $noncestr = $this->getRandStr(15);
    $timestamp = time();

    // var_dump($noncestr);
    // exit();
    $url = 'https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token='. $access_token .'&type=jsapi';
    $ret_json = file_get_contents($url);
    //ret return data show the wechat sending ok or not
    $ret = json_decode($ret_json);



    $_SESSION['jsapi_ticket'] = $ret-> ticket;

    $strvalue = 'jsapi_ticket='.$_SESSION['jsapi_ticket'].'&noncestr='.$noncestr.'&timestamp='.$timestamp.'&url=http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $signature = sha1($strvalue);
    // echo "ticket:".$ret-> ticket;
    $res=[
      'timestamp'=>$timestamp,
      'noncestr'=>$noncestr,
      'signature'=>$signature];
    // var_dump($strvalue);
    // die();
    return $res;
  }



}
