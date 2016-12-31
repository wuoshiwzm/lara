<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use APP\Http\Model\User;

class IndexController extends CommonController
{
    public function index(){
      // $user_info = session('user');
      // $user_class = $user_info->user_class;
      // switch($user_class){
      //   case '0':
      //   echo 0;
      //   return view('admin.index');
      //   case'1':
      //   return view('admin.company_index');
      //   case'2':
      //   return view('admin.person_index');
      //   // break;
      // }
      // die();
      return view('admin.index');
    }

    public function info()
    {
      //管理员主页
        $user_info = session('user');
        return view('admin.info', compact('user_info'));
    }

    //change password
    public function pass(){
    if($input = Input::all()){
      $rules=[
        'password'=>'between:6,20|confirmed|required',
        'password_o'=>'required',
        'password_confirmation'=>'required',
      ];
      $message=[
        'password.required'=>'新密码必填',
        'password_o.required'=>'原始密码必填',
        'password_confirmation.required'=>'确认新密码必填',
        'password.between'=>'新密码6-20位之间',
        'password.confirmed'=>'新密码两次输入密码不一致'
      ];
    $validator = Validator::make($input,$rules,$message);
    if($validator->passes()){

      $user = User::first();
      $_password = Crypt::decrypt($user->user_pass);
      if($input['password_o'] == $_password){
        $user->user_pass = Crypt::encrypt($input['password']);
        $user->update();

        return back()->with('errors','密码修改成功');
      }else{
        return back()->with('errors','原密码错误');
      }

    }else{
      return back()->withErrors($validator);
    }



    }else{

    }
        return view('admin.pass');
    }
}
