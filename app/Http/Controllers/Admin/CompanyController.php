<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Http\Model\Company;
use App\Http\Model\User;
use App\Http\Model\Industry;

use Illuminate\Support\Facades\Validator;

class CompanyController extends CommonController{
  function index(){

    if(session('company_id')){
    //company info
    $comInfo = Company::where('user_id',session('user')['user_id'])->first();
    //industry info
    $ind = Industry::get();

    return view('admin.company.update')
    ->with('comInfo',$comInfo)
    ->with('ind',$ind);
  }else{
    return view('admin');
  }


  }




  // GET|HEAD   编辑分类  | admin/company/{company}/edit
  public function edit($cate_id){


  }

  //PUT|PATCH     | admin/category/{category}
  public function update($company_id){
    $input = Input::except('_method','_token');

    $result = Company::where('company_id',$company_id)->update($input);

    if($result){

      return view('admin/info');
    }else{
      return back()->with('errors','分类信息更新失败');
    }

  }


  public function changeOrder(){

  }



  // 添加分类提交 POST   admin/category    admin.category.store
  public function store(){
    $input = Input::except('_token');

    if($input){
      $rules=[
        'cate_name'=>'required',
      ];
      $message=[
        'cate_name.required'=>'分类名称必填',

      ];
    $validator = Validator::make($input,$rules,$message);
    if($validator->passes()){
      $result =   Category::create($input);
      if($result){return redirect('admin/category');}
      else{return back()->with('errors','生成分类失败');}
      }else{
        return back()->withErrors($validator);
      }


  }
}


  //  添加分类GET|HEAD     | admin/category/create
  public function create(){
    // $data = Category::where('cate_pid',0)->get();
     $data = Category::get();

  return view('admin/category/add',compact('data',$data));
  }

  // GET|HEAD         | admin/category/{category}
  public function show(){

  }

  //DELETE    删除分类 | admin/category/{category}
  public function destroy($cate_id){

    // $test = Category::where('cate_pid',$cate_id)->count();
    // if($test){
    //   return $data=[
    //     'status'=>1,
    //     'msg'=>'有子分类 不能删除！',
    //   ];
    // }
    $result = Category::where('cate_id',$cate_id)->delete();
    Category::where('cate_pid',$cate_id)->update(['cate_pid'=>0]);
    if($result){
      $data=[
        'status'=>0,
        'msg'=>'删除成功！',
      ];
    }else{
      $data=[
        'status'=>1,
        'msg'=>'删除失败啦！！',
      ];
    }
    return $data;
  }





}
