<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Social\CommonController;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Model\SelfMedia;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Social\WechatController;





class ShareController extends CommonController
{



    function index($media_id){

      //already sign in
      // if(session('user')){
      //   $status=0;
      // }
      // else{
      //   //not sign in
      //   $status=1;
      // }
      // dd($wechat);

      //get openid and media_id and save to database. we send redpack ,to check the database if the user is in it !


      //get content of the media info use parameter $media_id
      $content = SelfMedia::where('id',$media_id)->first()->content;

      $wechat = new WechatController;
      $wechat=$wechat->shareData() ;
      // dd($wechat);

      return view('social.share')
      // ->with('status',$status)
      ->with('wechat',$wechat)
      ->with('content',$content)
      ->with('media_id',$media_id);

    }

    function index2($media_id){
      return view('social.share2')
      ->with('media_id',$media_id);
    }

    function content($media_id){
      $content = SelfMedia::where('id',$media_id)->first()->content;
      return view('social.sharecontent')
      ->with('content',$content);
    }

    //when share successed
    function sharesuccess($media_id){

      $APPID='wx260619ea73a4b130';
      $SECRET='469536da8d67cd9df2cdde5609ffefaf';
      $state='123';
      $code='';

      if($_GET['state']==$state){
      $code = $_GET['code'];
      $uinfo=file_get_contents("https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$APPID."&secret=".$SECRET."&code=".$code."&grant_type=authorization_code");
      $uinfo=(array)json_decode($uinfo);
      dd($uinfo);
      $openid=$uinfo['openid'];
      }

      dd($media_id);
    }



}
