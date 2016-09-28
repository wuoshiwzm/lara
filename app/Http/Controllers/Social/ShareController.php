<?php

namespace App\Http\Controllers\Social;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Social\CommonController;
use App\Http\Model\SelfMedia;

class ShareController extends CommonController
{
    function index($id=1){
      echo "test";

      //already sign in
      if(session('user')){
        $status=0;
      }
      else{
        //not sign in
        $status=1;
      }
      return view('social.share')
      ->with('status',$status);

    }

    function test(){
      $input=Input::all();
      $id = $input['id'];
      return SelfMedia::where('id',$id)->get();

    }
}
