<?php
namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Model\User;
use App\Http\Model\Company;
use App\Http\Model\Industry;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

class RegisterController extends CommonController{



  // 分类列表GET|HEAD                       | admin/register                 | admin.register.index
  public function index(){

    $ind = Industry::get();

      return view('home.register.register')
      ->with('ind',$ind);
  }

  // GET|HEAD   编辑分类  | admin/category/{category}/edit
  public function edit($cate_id){
    // $field = Category::find($cate_id);
    // $data = Category::where('cate_pid',0)->get();
    // return view('admin.category.edit',compact('field','data'));
  }

  //PUT|PATCH     | home/category/{category}
  public function update($cate_id){
    // $input = Input::except('_method','_token');
    // $result = Category::where('cate_id',$cate_id)->update($input);
    //
    // if($result){
    //   return redirect('admin/category');
    // }else{
    //   return back()->with('errors','分类信息更新失败');
    // }

  }

  // 添加分类提交 POST   register    register.store
  public function store(){
    $input = Input::except('_token');
    // dd($input);
    if($input['user_class']==1){

      //for the personal user registeration
      $rules=[
        'user_name'=>'required|regex:/\w/',
        'user_pass'=>'required|min:6|same:user_repass',
        'user_repass'=>'required|min:6',
        'user_email'=>'required|email',

      ];
      $message=[
        'user_name.required'=>'用户名填写错误',
        'user_name.regex'=>'用户名只能使用字母数字与特殊符号',
        'user_pass.required'=>'密码未填写',
        'user_pass.min'=>'密码最少6位',
        'user_pass.same'=>'两次输入密码不同',
        'user_repass.required'=>'确认密码未填写',
        'user_repass.min'=>'确认密码不足6位',
        'user_email.required'=>'邮箱未填写',
        'user_email.email'=>'邮箱格式错误',



      ];
    $validator = Validator::make($input,$rules,$message);

    $email = $input['user_email'];
    $email= trim($email);
    $email = strtolower($email);
    $emailtail = substr($email,strrpos($email,'.',-1)+1,strlen($email));
    $email2 = substr($email,0,strrpos($email,'.',-1));
    $emailbody = substr($email2,strrpos($email2,'@',-1)+1,strlen($email2));
    $emailhead= substr($email2,0,strrpos($email2,'@',-1));


    $password = Crypt::encrypt($input['user_pass']);
    $user = [
      'user_name'=>$input['user_name'],
      'user_pass'=>$password,
      'user_class'=>$input['user_class'],
      'user_emailhead'=>$emailhead,
      'user_emailbody'=>$emailbody,
      'user_emailtail'=>$emailtail
    ];
    //validation finish
    if($validator->passes()){
      $result =   User::create($user);
      if($result){return redirect('admin/login');}
      else{return back()->with('errors','生成分类失败');}
      }else{
        return back()->withErrors($validator);
      }


    }
    //for the company user registeration
    elseif ($input['user_class']==2) {

      $rules=[
        'user_name'=>'required',
        'user_pass'=>'required|min:6|same:user_repass',
        'user_repass'=>'required|min:6',
        'user_email'=>'required|email',

        'company_name'=>'required',
        'company_cert'=>'required',
        'company_add1'=>'required',
        'company_add2'=>'required',
        // 'company_add3'=>'required',
        'company_contact'=>'required|min:1|max:22',
        'company_tel'=>'required|min:7|max:22',
        'company_ind'=>'required',
            ];
      $message=[
        'user_name.required'=>'用户名填写错误',
        'user_pass.required'=>'密码未填写',
        'user_pass.min'=>'密码最少6位',
        'user_pass.same'=>'两次输入密码不同',
        'user_repass.required'=>'确认密码未填写',
        'user_repass.min'=>'确认密码不足6位',
        'user_email.required'=>'邮箱未填写',
        'user_email.email'=>'邮箱格式错误',

        'company_name.required'=>'公司名称必填',
        'company_cert.required'=>'请上传公司营业执照',
        'company_add1.required'=>'请公司地址所属省',
        'company_add2.required'=>'请公司地址所属市',
        // 'company_add3.required'=>'请公司地址所属区',
        'company_contact.required'=>'请填写公司联系人',
        'company_tel.required'=>'请填空正确的公司联系电话',
        'company_tel.min:7'=>'请填空正确的公司联系电话',
        'company_tel.max:22'=>'请填空正确的公司联系电话',
        'company_ind.required'=>'请选择公司所属行业',

      ];
    $validator = Validator::make($input,$rules,$message);
    $email = $input['user_email'];
    $email= trim($email);
    $email = strtolower($email);
    $emailtail = substr($email,strrpos($email,'.',-1)+1,strlen($email));
    $email2 = substr($email,0,strrpos($email,'.',-1));
    $emailbody = substr($email2,strrpos($email2,'@',-1)+1,strlen($email2));
    $emailhead= substr($email2,0,strrpos($email2,'@',-1));

    $password = Crypt::encrypt($input['user_pass']);

    $user = [
      'user_name'=>$input['user_name'],
      'user_pass'=>$password,
      'user_class'=>$input['user_class'],
      'user_emailhead'=>$emailhead,
      'user_emailbody'=>$emailbody,
      'user_emailtail'=>$emailtail
    ];

    //validation finish
    if($validator->passes()){
      //save registeration for user table
      $result =   User::create($user);
      $res1 = $result['user_id'];
      if($result){
      //save registeration for company table

      // dd($input);
        $company=[
          'company_name'=>$input['company_name'],
          'user_id'=>$res1,
          'company_cert'=>$input['company_cert'],
          'company_add1'=>$input['company_add1'],
          'company_add2'=>$input['company_add2'],
          'company_add3'=>$input['company_add3'],
          'company_contact'=>$input['company_contact'],
          'company_tel'=>$input['company_tel'],
          'company_ind'=>$input['company_ind'],
        ];

        $result = Company::create($company);
        if(!$result){
          echo "save failed!-delete user info!";
          User::destroy($res1);
        }
        // dd($result);
        return redirect('admin/login');}
      else{return back()->with('errors','存储数据失败，请重新注册');}
      }else{
        return back()->withErrors($validator);
      }



    }
    //$input is invalid
    return false;
}


  //  添加分类GET|HEAD     | admin/category/create
  public function create(){
    // $data = Category::where('cate_pid',0)->get();


  }

  // GET|HEAD         | admin/category/{category}
  public function show(){

  }

  //DELETE    删除分类 | admin/category/{category}
  public function destroy($cate_id){

    // $result = Category::where('cate_id',$cate_id)->delete();
    // Category::where('cate_pid',$cate_id)->update(['cate_pid'=>0]);
    // if($result){
    //   $data=[
    //     'status'=>0,
    //     'msg'=>'删除成功！',
    //   ];
    // }else{
    //   $data=[
    //     'status'=>1,
    //     'msg'=>'删除失败啦！！',
    //   ];
    // }
    // return $data;
  }





}
