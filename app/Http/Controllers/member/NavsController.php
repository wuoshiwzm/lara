<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\navs;
use App\Http\ModeL\Category;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class NavsController extends Controller
{

    // GET|HEAD   编辑链接  | admin/navs/{navs}/edit
  public function edit($nav_id){
    $field = Navs::find($nav_id);
    return view('admin.navs.edit',compact('field'));
  }

  //PUT|PATCH     | admin/navs/{navs}
  public function update($nav_id){
    $input = Input::except('_method','_token');
    $result = Navs::where('nav_id',$nav_id)->update($input);

    if($result){
      return redirect('admin/navs');
    }else{
      return back()->with('errors','友情链接更新失败');
    }

  }






      // 添加链接提交 POST   admin/navs    admin.navs.store
      public function store(){
        $input = Input::except('_token');
        if($input){
          $rules=[
            'nav_name'=>'required',
            'nav_url'=>'required',
          ];
          $message=[
            'nav_name.required'=>'导航名称必填',
            'nav_url.required'=>'导航Url必填',
          ];
        $validator = Validator::make($input,$rules,$message);
        if($validator->passes()){
          $result =   navs::create($input);
          if($result){return redirect('admin/navs');}
          else{return back()->with('errors','生成分类失败');}
          }else{
            return back()->withErrors($validator);
          }


      }
    }


  //  添加 链接 GET|HEAD  admin/navs/create
  public function create(){
    return view('admin/navs/add');
  }




  // 链接列表GET|HEAD  admin/navs
  public function index(){
    $data = Navs::orderBy('nav_order','asc')->get();
    return view('admin.navs.index',compact('data'));

  }

  public function changeOrder(){
    $input = Input::except('_token');
    $navs = Navs::find($input['nav_id']);
    $navs->nav_order=$input['nav_order'];
    $result =   $navs->update();
    if($result){
      $data=[
        'status'=>0,
        'msg'=>'更改排序 成功！',
      ];
    }else{
      $data=[
        'status'=>1,
        'msg'=>'更改排序 失败！',
      ];
    }
    return $data;
  }

  public function show(){

  }


  public function destroy($nav_id){
    $result = navs::where('nav_id',$nav_id)->delete();
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
