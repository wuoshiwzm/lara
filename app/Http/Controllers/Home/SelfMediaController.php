<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Http\Model\SelfMedia;
use App\Http\Model\User;
use App\Http\Controllers\Home\CommonController;
use App\Http\Controllers\Home\WechatController;

class SelfMediaController extends CommonController
{


  public function index(){
    $self_medias = SelfMedia::leftJoin('user','self_media.user_id','=','user.user_id')->get();
    // dd($self_medias);
    // dd($self_media);

    $wechatData = (new WechatController)->wechat_data();
    // dd($wechatData);
    // dd($wechatData);
    return view('home/self_media')
    ->with('self_medias',$self_medias)
    ->with('timestamp',$wechatData['timestamp'])
    ->with('nonceStr',$wechatData['noncestr'])
    ->with('signature',$wechatData['signature']);
  }

  public function add(){
    $input=Input::all();
    $user = session('user');


    if(!$user){
      //0 means user need to login
      $data=[
        'status'=>0,
        'msg'=>'你未登录，请先登录再发送'
      ];
      return $data;
    }elseif(!$input['content']){
      //1 means the content is empty
      $data=[
        'status'=>1,
        'msg'=>'发送内容不能为空'

      ];
      return $data;
    }elseif($user['user_balance'] <= 0 ){
      //2 means the balance is empty need to recharge
      $data=[
        'status'=>2,
        'msg'=>'您账户余额为空，请充值'
      ];
      return $data;
    }else{
      //4 succeed and notice user that each twitte will charge him 1 currency
      $data=[
        'status'=>4,
        'msg'=>'已经成功发送，奇迹即将发生！'
      ];

      $res['user_id'] = $user['user_id'];
      $res['content'] = $input['content'];
      SelfMedia::create($res);
      return $data;
    }

    // dd($user['user_balance']);


  }






}


?>
