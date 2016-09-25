<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Links;
use App\Http\ModeL\Category;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class LinksController extends Controller
{

    // GET|HEAD   编辑链接  | admin/links/{links}/edit
  public function edit($link_id){
    $field = Links::find($link_id);
    return view('admin.links.edit',compact('field'));
  }

  //PUT|PATCH     | admin/links/{links}
  public function update($link_id){
    $input = Input::except('_method','_token');
    $result = Links::where('link_id',$link_id)->update($input);

    if($result){
      return redirect('admin/links');
    }else{
      return back()->with('errors','友情链接更新失败');
    }

  }






      // 添加链接提交 POST   admin/links    admin.links.store
      public function store(){
        $input = Input::except('_token');
        if($input){
          $rules=[
            'link_name'=>'required',
            'link_url'=>'required',
          ];
          $message=[
            'link_name.required'=>'链接名称必填',
            'link_url.required'=>'链接Url必填',
          ];
        $validator = Validator::make($input,$rules,$message);
        if($validator->passes()){
          $result =   Links::create($input);
          if($result){return redirect('admin/links');}
          else{return back()->with('errors','生成分类失败');}
          }else{
            return back()->withErrors($validator);
          }


      }
    }


  //  添加 链接 GET|HEAD  admin/links/create
  public function create(){

  return view('admin/links/add');
  }




  // 链接列表GET|HEAD  admin/links
  public function index(){
    $data = Links::orderBy('link_order','asc')->get();
    return view('admin.links.index',compact('data'));

  }

  public function changeOrder(){
    $input = Input::except('_token');
    $links = Links::find($input['link_id']);
    $links->link_order=$input['link_order'];
    $result =   $links->update();
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


  public function destroy($link_id){
    $result = Links::where('link_id',$link_id)->delete();
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
