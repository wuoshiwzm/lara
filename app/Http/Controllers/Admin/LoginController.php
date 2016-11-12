<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use App\Http\Model\Company;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;


require_once 'resources/org/code/Code.class.php';
class LoginController extends CommonController
{
    public function login()
    {

      if(session('user')){
            if(session('company_id')){
               return redirect('admin');
            }
            if((Company::where('user_id',session('user')['user_id'])->first()) && !(session('company_id'))){
               $company_id = Company::where('user_id',session('user')['user_id'])->first()->user_id;
               session(['company_id'=>$company_id]);
            }
           return redirect('admin');
       }

        if ($input = Input::except('_token')) {
            // dd($input);
            $code = new \Code;

            $_code = $code->get();
            if (strtoupper($input['code']) != $_code) {
                return back()->with('msg', '验证码错误！');
            }

            $user = User::where('user_name',$input['user_name'])->first();

            if(!$user){
              return back()->with('msg', '用户名或密码错误！');
            }

            // die(Crypt::encrypt($input['user_pass']));
            // die(Crypt::decrypt('eyJpdiI6Ilp3dFRoRm5UT0ZVdExIZWN3TUpRS0E9PSIsInZhbHVlIjoiN1Q2YTA5b1BiUGFWYkZRem9JdCtcL3c9PSIsIm1hYyI6ImJhYjVjNGFhNzgzMDdmZmExMGRkYWYyOWEwMjBlOGM4YjZmNjI4MjhkNWZkMDM5OTQ2M2JhMzBkNWIwNWYyY2EifQ=='));


            $test =  $user->user_pass;
            // die($test);
            if ($user->user_name!=$input['user_name']
                || Crypt::decrypt($user->user_pass) != $input['user_pass']
            ) {
                return back()->with('msg', '用户名或密码错误！');
            }
            session(['user'=>$user]);
            if(Company::where('user_id',session('user')['user_id'])->first()){
              $company_id = Company::where('user_id',session('user')['user_id'])->first()->user_id;

              session(['company_id'=>$company_id]);
            }

            return redirect('admin');
        }
            else{
                return view('admin.login');
            }



    }


    public function code(){

        $code = new \Code;
        $code->make();
    }

    public function quit()
    {
        session(['user'=>null]);
        if(session('company_id')){
          session(['company_id'=>null]);
        }
        return redirect('');
    }

}
