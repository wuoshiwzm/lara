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

      //get content of the media info use parameter $media_id

      $content = SelfMedia::where('id',$media_id)->first()->content;
      // dd($content);
      $wechat = new WechatController;
      $wechat=$wechat->shareData() ;
      // dd($wechat);

      return view('social.share')
      // ->with('status',$status)
      ->with('wechat',$wechat)
      ->with('content',$content);

    }

    function index2($media_id){
      return view('social.share2')
      ->with('media_id',$media_id);
    }

    function content(){
      $input=Input::all();
      // dd($input);
      $id = $input['id'];
      return SelfMedia::where('id',$id)->get();

    }
}
