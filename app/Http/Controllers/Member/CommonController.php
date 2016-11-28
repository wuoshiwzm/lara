<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CommonController extends Controller
{
    //for extends only


    //upload pic
    public function upload(){
      $file = Input::file('Filedata');
      if($file->isValid()){
        $realPath = $file->getRealPath(); // 临时文明的绝对路径
        $entension = $file->getClientOriginalExtension();
        $newName = date('YmdHis').mt_rand(100,999).'.'.$entension;
        $path = $file->move(base_path().'/uploads',$newName);
         $filepath = 'uploads/'.$newName;
        return $filepath;
      }
    }










}
