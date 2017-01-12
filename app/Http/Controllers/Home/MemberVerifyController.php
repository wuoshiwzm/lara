<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Model\User;
use App\Http\Model\MailRecord;
use Illuminate\Support\Facades\Crypt;

class MemberVerifyController extends CommonController
{
    public function forgotpass()
    {
    	return view('home/forgotpass');
    }

    //验证用户身份，发送重置密码邮件
    public function verifyuser()
    {
    	$res = array('code'=>false, 'msg'=>'');
    	$uname = isset($_REQUEST['uname']) ? addslashes(trim($_REQUEST['uname'])) : '';
    	$user = User::where('user_name',$uname)->first();
    	if($user)
    	{
    		if($user->user_emailhead)
    		{
    			$emailstr = $user->user_emailhead.'@'.$user->user_emailbody.'.'.$user->user_emailtail;
    			$flagcode = md5(time().mt_rand(100,999));
    			$htmlstr = '<p style="white-space: normal;"><strong><span style="font-size: 12px;">亲爱的用户</span></strong></p><p style="white-space: normal;"><span style="font-size: 12px;">您忘记登录密码了吗？点击以下链接，重新设置密码。<span style="color:#c00000">切勿将邮件内容透露给他人！！！</span></span><br/></p><p style="white-space: normal;"><span style="font-size: 12px;">';
    			$htmlstr .= '<a href="http://adbangbang.com/resetpass/'.$flagcode.'">http://adbangbang.com/resetpass/'.$flagcode.'</a>';
    			$htmlstr .= '</span><span style="font-size: 12px;"></span></p><p style="white-space: normal;"><span style="font-size: 12px;"></span></p><p style="white-space: normal; color: rgb(51, 51, 51); font-family: arial, verdana, sans-serif; font-size: 13px;">如果您以上链接无法点击，您可以将以上链接复制并粘贴到浏览器地址栏打开</p><p style="white-space: normal; color: rgb(51, 51, 51); font-family: arial, verdana, sans-serif; font-size: 13px;">此信由系统自动发出，系统不接收回信，因此请勿直接回复。</p><p style="white-space: normal; color: rgb(51, 51, 51); font-family: arial, verdana, sans-serif; font-size: 13px;"><br/></p><p style="white-space: normal; text-align: right; color: rgb(51, 51, 51); font-family: arial, verdana, sans-serif; font-size: 13px;">无穷大团队</p><p style="white-space: normal;"><span style="font-size: 12px;"><br/></span></p><p><br/></p>';
    			$data = [
    				'uid' => $user->user_id,
    				'email' => $emailstr,
    				'flagstr' => $flagcode,
    				'content' => serialize(array($htmlstr)),
    				'remark' => '忘记密码'
    			];
    			if(MailRecord::create($data))
    			{
	    			$sendres = sendEmailToOne($emailstr, '忘记密码，邮箱验证', $htmlstr);
	    			$res['code'] = true;
	    			$res['msg'] = "系统已经将身份验证邮件发送至您的".substr($user->user_emailhead,0,3).'***@'.$user->user_emailbody.'.'.$user->user_emailtail."，请进入邮箱完成重置密码操作";
    			}
    			else
    			{
    				$res['msg'] = "系统错误，请稍后再试";
    			}
    		}
    		else
    		{
    			$res['msg'] = "您的用户信息有误，请联系客服帮您解决问题";
    		}
    	}
    	else
    	{
    		$res['msg'] = "身份验证失败，请联系客服帮您解决问题";
    	}

    	echo json_encode($res);
    	exit;
    }

    public function resetpass($flagcode)
    {
    	$flagcode = isset($flagcode) ? addslashes(trim($flagcode)) : '';
    	if($flagcode)
    	{
    		$mrdata = MailRecord::where('flagstr', $flagcode)->where('status', 0)->first();
    		if($mrdata)
    		{
    			return view('home/resetpass', compact('flagcode'));
    		}
    		else
    		{
	    		header('location:/');
	    		exit;
    		}
    	}
    	else
    	{
    		header('location:/');
    		exit;
    	}
    }

    public function ajaxresetpass()
    {
    	$res = array('code'=>false, 'msg'=>'');
    	$code = isset($_REQUEST['code']) ? addslashes(trim($_REQUEST['code'])) : '';
    	$uname = isset($_REQUEST['uname']) ? addslashes(trim($_REQUEST['uname'])) : '';
    	$pass = isset($_REQUEST['pass']) ? addslashes(trim($_REQUEST['pass'])) : '';
    	if($uname && $pass)
    	{
    		$mrdata = MailRecord::where('flagstr', $code)->where('status', 0)->first();
    		if($mrdata)
    		{
    			$user = User::find($mrdata->uid);
    			if($uname == $user->user_name)
    			{
    				$newpass = Crypt::encrypt($pass);
    				if($user->update(['user_pass'=>$newpass]))
    				{
    					$mrdata->update(['status'=>1]);
    					$res['code'] = true;
    					$res['msg'] = '密码重置成功';
    				}
    				else
    				{
    					$res['msg'] = '修改失败，请重新设置，或联系客服寻求帮助';
    				}
    			}
    			else
    			{
    				$res['msg'] = '用户名不正确，请重新填写';
    			}
    		}
    		else
    		{
    			$res['msg'] = '用户信息不正确，请重新填写';
    		}
    	}
    	else
    	{
    		$res['msg'] = '用户信息不正确，请重新填写';
    	}
    	echo json_encode($res);
    	exit;
    }
}
