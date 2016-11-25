<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Mpic;
use App\Http\ModeL\Category;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class MpicController extends Controller
{

  // 链接列表GET|HEAD  admin/mpic
  public function index(){
    $data = Mpic::orderBy('mpic_order','asc')->get();
    return view('admin.mpic.index',compact('data'));

  }

  //  添加 链接 GET|HEAD  admin/mpic/create
  public function create(){
    return view('admin/mpic/add');
  }

  // 添加链接提交 POST   admin/mpic    admin.mpic.store
  public function store(){
    $input = Input::except('_token');
    if($input){
      $rules=[
        'mpic_name'=>'required',
        'mpic_path'=>'required',
      ];
      $message=[
        'mpic_name.required'=>'横幅名称必填',
        'mpic_path.required'=>'未上传横幅',
      ];
    $validator = Validator::make($input,$rules,$message);
    if($validator->passes()){
      $result =   Mpic::create($input);
      if($result){return redirect('admin/mpic');}
      else{return back()->with('errors','生成分类失败');}
      }else{
        return back()->withErrors($validator);
      }


    }
  }



    // GET|HEAD   编辑链接  | admin/mpic/{mpic}/edit
  public function edit($mpic_id){
    $field = Mpic::find($mpic_id);
    return view('admin.mpic.edit',compact('field'));
  }

  //PUT|PATCH     | admin/mpic/{mpic}
  public function update($mpic_id){
    $input = Input::except('_method','_token');
    $result = Mpic::where('mpic_id',$mpic_id)->update($input);

    if($result){
      return redirect('admin/mpic');
    }else{
      return back()->with('errors','友情链接更新失败');
    }

  }




  public function changeOrder(){
    $input = Input::except('_token');
    $mpic = Mpic::find($input['mpic_id']);
    $mpic->mpic_order=$input['mpic_order'];
    $result =   $mpic->update();
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


  public function destroy($mpic_id){
    $result = Mpic::where('mpic_id',$mpic_id)->delete();
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
