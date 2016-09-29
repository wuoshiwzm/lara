<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Social\CommonController;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Model\SelfMedia;
use Illuminate\Support\Facades\View;





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

    function content(){
      $input=Input::all();
      // dd($input);
      $id = $input['id'];
      return SelfMedia::where('id',$id)->get();

    }
}
