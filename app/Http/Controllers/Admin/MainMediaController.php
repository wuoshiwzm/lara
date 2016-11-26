<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\ModeL\Category;
use App\Http\ModeL\MainMedia;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

//主流媒体
class MainMediaController extends Controller
{


  // 链接列表GET|HEAD  admin/main_media
  public function index(){
    $data = MainMedia::orderBy('main_media_order','asc')->get();
    return view('admin.main_media.index',compact('data'));
  }

  //  添加 链接 GET|HEAD  admin/main_media/create
  public function create(){
    $cate = Category::all();
    return view('admin/main_media/add',compact('cate'));
  }

  // 添加链接提交 POST   admin/main_media    admin.main_media.store
  public function store(){
    $input = Input::except('_token');

    if($input){
      $rules=[
        'main_media_name'=>'required',
        'main_media_en'=>'required',
        'main_media_cate_id'=>'required',

      ];
      $message=[
        'main_media_name.required'=>'媒体名称必填',
        'main_media_en.required'=>'媒体别名必填',
        'main_media_cate_id.required'=>'未选择传媒体类型',
      ];
    $validator = Validator::make($input,$rules,$message);
        if($validator->passes()){
          $input['main_media_url'] = url('cate/'.  $input['main_media_cate_id']);
          // dd($input['main_media_url']);
          $result =   MainMedia::create($input);
          if($result){return redirect('admin/main_media');}
          else{return back()->with('errors','生成失败');}
          }else{
            return back()->withErrors($validator);
          }
    }
  }



    // GET|HEAD   编辑链接  | admin/main_media/{main_media}/edit
  public function edit($main_media_id){
    $field = MainMedia::find($main_media_id);
    $cate = Category::all();
    return view('admin.main_media.edit',compact('field','cate'));
  }

  //PUT|PATCH     | admin/main_media/{main_media}
  public function update($main_media_id){
    $input = Input::except('_method','_token');
    $result = MainMedia::where('main_media_id',$main_media_id)->update($input);

    if($result){
      return redirect('admin/main_media');
    }else{
      return back()->with('errors','友情链接更新失败');
    }

  }




  public function changeOrder(){
    $input = Input::except('_token');
    // dd($input);
    $main_media = MainMedia::find($input['main_media_id']);
    $main_media->main_media_order=$input['main_media_order'];
    $result =   $main_media->update();
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


  public function destroy($main_media_id){
    $result = MainMedia::where('main_media_id',$main_media_id)->delete();
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
