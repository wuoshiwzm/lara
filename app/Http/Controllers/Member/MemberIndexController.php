<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use APP\Http\Model\User;

class MemberIndexController extends CommonController
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
      return view('member.index');
    }

    public function info()
    {
        $userId = \Session::get('user')->user_id;
        $userBalance = User::find($userId)->user_balance;
        return view('member.info',compact('userBalance'));
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
        return view('member.pass');
    }

    public function ajaxgetbalance()
    {
        $userId = \Session::get('user')->user_id;
        $userBalance = User::find($userId)->user_balance;
        echo json_encode(array('data'=>intval($userBalance)));
        exit;
    }

    public function myinfo()
    {
      $userId = \Session::get('user')->user_id;
      $user = User::find($userId)->toArray();
      return view('member.myinfo')
        ->with('userinfo', $user);
    }

    public function editmyinfo()
    {
      $input = Input::all();
      $nickname = empty($input['fname']) ? '' : trim($input['fname']);
      $cellphone = empty($input['phone']) ? '' : trim($input['phone']);
      $email = empty($input['email']) ? '' : trim($input['email']);
      $address = empty($input['addr']) ? '' : trim($input['addr']);
      $headimg = empty($input['myheaderimg']) ? '' : trim($input['myheaderimg']);
      if(empty($nickname) || empty($cellphone) || empty($email) || empty($address))
      {
        echo '<script>alert("用户信息有误，请重新填写");history.back(-1);</script>';
        exit;
      }

      $email = strtolower($email);
      $emailtail = substr($email,strrpos($email,'.',-1)+1,strlen($email));
      $email2 = substr($email,0,strrpos($email,'.',-1));
      $emailbody = substr($email2,strrpos($email2,'@',-1)+1,strlen($email2));
      $emailhead= substr($email2,0,strrpos($email2,'@',-1));

      $userId = \Session::get('user')->user_id;
      $user = User::find($userId);
      $user->nickname = $nickname;
      $user->cellphone = $cellphone;
      $user->user_emailhead = $emailhead;
      $user->user_emailbody = $emailbody;
      $user->user_emailtail = $emailtail;
      $user->address = $address;
      $user->headimg = $headimg;
      $result = $user->update();
      if($result)
      {
        echo '<script>alert("个人信息修改成功！");location.href="/member/myinfo";</script>';
        exit;
      }
      else
      {
        echo '<script>alert("个人信息修改失败！");history.back(-1);</script>';
        exit;
      }
    }

    public function ajaxuploadheader()
    {
      $base64_image_content = isset($_REQUEST['imgdata']) ? trim($_REQUEST['imgdata']) : '';
      $base64_image_content = str_replace(' ', '+', $base64_image_content);
      //匹配出图片的格式
      if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)){
        $type = $result[2];
        $new_file = date('YmdHis').mt_rand(100,999).".{$type}";
        $imgpath = '/uploads/'.$new_file;
        header("Content-type:image/"."{$type}");
        file_put_contents(base_path().$imgpath, base64_decode(str_replace($result[1], '', $base64_image_content)));
        echo $imgpath;
        exit;
      }
    }
}
