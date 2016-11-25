<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Spic;
use App\Http\ModeL\Category;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class SpicController extends Controller
{

  // 链接列表GET|HEAD  admin/spic
  public function index(){
    $data = Spic::orderBy('spic_order','asc')->get();
    return view('admin.spic.index',compact('data'));

  }

  //  添加 链接 GET|HEAD  admin/spic/create
  public function create(){
    return view('admin/spic/add');
  }

  // 添加链接提交 POST   admin/spic    admin.spic.store
  public function store(){
    $input = Input::except('_token');
    if($input){
      $rules=[
        'spic_name'=>'required',
        'spic_path'=>'required',
      ];
      $message=[
        'spic_name.required'=>'横幅名称必填',
        'spic_path.required'=>'未上传横幅',
      ];
    $validator = Validator::make($input,$rules,$message);
    if($validator->passes()){
      $result =   Spic::create($input);
      if($result){return redirect('admin/spic');}
      else{return back()->with('errors','生成分类失败');}
      }else{
        return back()->withErrors($validator);
      }


    }
  }



    // GET|HEAD   编辑链接  | admin/spic/{spic}/edit
  public function edit($spic_id){
    $field = Spic::find($spic_id);
    return view('admin.spic.edit',compact('field'));
  }

  //PUT|PATCH     | admin/spic/{spic}
  public function update($spic_id){
    $input = Input::except('_method','_token');
    $result = Spic::where('spic_id',$spic_id)->update($input);

    if($result){
      return redirect('admin/spic');
    }else{
      return back()->with('errors','友情链接更新失败');
    }

  }




  public function changeOrder(){
    $input = Input::except('_token');
    $spic = Spic::find($input['spic_id']);
    $spic->spic_order=$input['spic_order'];
    $result =   $spic->update();
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


  public function destroy($spic_id){
    $result = Spic::where('spic_id',$spic_id)->delete();
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
