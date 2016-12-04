<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\PageBanner;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class PageBannerController extends Controller
{

  // 链接列表GET|HEAD  admin/page_banner
  public function index(){
    $data = PageBanner::orderBy('page_banner_order','asc')->get();
    return view('admin.page_banner.index',compact('data'));

  }

  //  添加 链接 GET|HEAD  admin/page_banner/create
  public function create(){
    return view('admin/page_banner/add');
  }

  // 添加链接提交 POST   admin/page_banner    admin.page_banner.store
  public function store(){
    $input = Input::except('_token');
    if($input){
      $rules=[
        'page_banner_name'=>'required',
        'page_banner_path'=>'required',
      ];
      $message=[
        'page_banner_name.required'=>'横幅名称必填',
        'page_banner_path.required'=>'未上传横幅',
      ];
    $validator = Validator::make($input,$rules,$message);
    if($validator->passes()){
      $result =   PageBanner::create($input);
      if($result){return redirect('admin/page_banner');}
      else{return back()->with('errors','生成分类失败');}
      }else{
        return back()->withErrors($validator);
      }


    }
  }



    // GET|HEAD   编辑链接  | admin/page_banner/{page_banner}/edit
  public function edit($page_banner_id){
    $field = PageBanner::find($page_banner_id);
    return view('admin.page_banner.edit',compact('field'));
  }

  //PUT|PATCH     | admin/page_banner/{page_banner}
  public function update($page_banner_id){
    $input = Input::except('_method','_token');
    $result = PageBanner::where('page_banner_id',$page_banner_id)->update($input);

    if($result){
      return redirect('admin/page_banner');
    }else{
      return back()->with('errors','更新失败');
    }

  }




  public function changeOrder(){
    $input = Input::except('_token');
    $page_banner = PageBanner::find($input['page_banner_id']);
    $page_banner->page_banner_order=$input['page_banner_order'];
    $result =   $page_banner->update();
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


  public function destroy($page_banner_id){
    $result = PageBanner::where('page_banner_id',$page_banner_id)->delete();
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
