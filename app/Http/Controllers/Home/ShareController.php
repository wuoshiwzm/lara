<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Http\Controllers\Home\CommonController;
use App\Http\Model\SelfMedia;

class ShareController extends CommonController
{
    function index($id=1){
      //already sign in
      if(session('user')){
        $status=0;
        return view('home.share')
        ->with('status',$status);
      }
      else{
        //not sign in
        $status=1;
        return view('home.share')
        ->with('status',$status);
      }

    }

    function test(){
      $input=Input::all();
      $id = $input['id'];
      return SelfMedia::where('id',$id)->get();

    }
}
