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




    function index(){
      // echo "test";

      //already sign in
      if(session('user')){
        $status=0;
      }
      else{
        //not sign in
        $status=1;
      }
      // dd($wechat);
      $wechat = new WechatController;
      $wechat=$wechat->shareData() ;
      // dd($wechat);

      return view('social.share')
      ->with('status',$status)
      ->with('wechat',$wechat);

    }

    function index2(){
      return view('social.share2');
    }

    function content(){
      $input=Input::all();
      // dd($input);
      $id = $input['id'];
      return SelfMedia::where('id',$id)->get();

    }
}
