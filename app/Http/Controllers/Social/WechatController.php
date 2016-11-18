<?php

namespace App\Http\Controllers\Social;

use App\Http\Model\Data;
use App\Http\Controllers\Social\CommonController;

class WechatController extends CommonController{


  private $appid='wx260619ea73a4b130';
  private $secret = '469536da8d67cd9df2cdde5609ffefaf';


  public function test(){
    echo "test-wechatcontroller";
  }

  public function getRandStr($num){
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
    dd($url_token);

    $timeNow = time();
    $tokenData = Data::where('data_name','access_token')->orderBy('created_at','desc')->first();
    // dd($tokenData);
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


  // get the info sharing need
  public function shareData(){

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

    $res=[
      'timestamp'=>$timestamp,
      'noncestr'=>$noncestr,
      'signature'=>$signature];

      return $res;
  }



}
