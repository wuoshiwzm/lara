<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
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
        return redirect('admin');
      }

        if ($input = Input::except('_token')) {
            // dd($input);
            $code = new \Code;

            $_code = $code->get();
            if (strtoupper($input['code']) != $_code) {
                return back()->with('msg', 'capcha wrong');
            }

            $user = User::where('user_name',$input['user_name'])->first();

            if(!$user){
              return back()->with('msg', 'username or password wrong!');
            }


            $test =  $user->user_pass;
            if ($user->user_name!=$input['user_name']
                || Crypt::decrypt($user->user_pass) != $input['user_pass']
            ) {
                return back()->with('msg', 'username or password wrong!');
            }
            session(['user'=>$user]);
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
        return redirect('');
    }

}
