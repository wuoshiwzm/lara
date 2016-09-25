<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Http\Model\SelfMedia;
use Illuminate\Support\Facades\Validator;

class SelfMediaController extends CommonController
{
    // 分类列表GET|HEAD        admin/self_media                 | admin.self_media.index
    public function index(){
        $self_medias = SelfMedia::paginate(5);
        return view('admin.self_media.index')->with('data',$self_medias);
        // return view('admin.self_media.index')->with('data',$self_medias);
    }

    // GET|HEAD   编辑分类  | admin/self_media/{self_media}/edit
    public function edit($cate_id){
      // $field = self_media::find($cate_id);
      // $data = self_media::where('cate_pid',0)->get();
      // return view('admin.self_media.edit',compact('field','data'));
    }

    //PUT|PATCH     | admin/self_media/{self_media}
    public function update($cate_id){
      // $input = Input::except('_method','_token');
      // $result = self_media::where('cate_id',$cate_id)->update($input);
      //
      // if($result){
      //   return redirect('admin/self_media');
      // }else{
      //   return back()->with('errors','分类信息更新失败');
      // }

    }


    public function changeOrder(){
      // $input = Input::all();
      // $cate = self_media::find($input['cate_id']);
      // $cate->cate_order=$input['cate_order'];
      // $result =   $cate->update();
      // if($result){
      //   $data=[
      //     'status'=>0,
      //     'msg'=>'更改排序 成功！',
      //   ];
      // }else{
      //   $data=[
      //     'status'=>1,
      //     'msg'=>'更改排序 失败！',
      //   ];
      // }
      // return $data;
    }



    // 添加分类提交 POST   admin/self_media    admin.self_media.store
    public function store(){
    //   $input = Input::except('_token');
    //
    //   if($input){
    //     $rules=[
    //       'cate_name'=>'required',
    //     ];
    //     $message=[
    //       'cate_name.required'=>'分类名称必填',
    //
    //     ];
    //   $validator = Validator::make($input,$rules,$message);
    //   if($validator->passes()){
    //     $result =   self_media::create($input);
    //     if($result){return redirect('admin/self_media');}
    //     else{return back()->with('errors','生成分类失败');}
    //     }else{
    //       return back()->withErrors($validator);
    //     }
    //
    //
    // }
  }


    //  添加分类GET|HEAD     | admin/self_media/create
    public function create(){
    //    $data = self_media::get();
    //
    // return view('admin/self_media/add',compact('data',$data));
    }

    // GET|HEAD         | admin/self_media/{self_media}
    public function show(){

    }

    //DELETE    删除分类 | admin/self_media/{self_media}
    public function destroy($cate_id){

      // $test = self_media::where('cate_pid',$cate_id)->count();
      // if($test){
      //   return $data=[
      //     'status'=>1,
      //     'msg'=>'有子分类 不能删除！',
      //   ];
      // }
    //   $result = self_media::where('cate_id',$cate_id)->delete();
    //   self_media::where('cate_pid',$cate_id)->update(['cate_pid'=>0]);
    //   if($result){
    //     $data=[
    //       'status'=>0,
    //       'msg'=>'删除成功！',
    //     ];
    //   }else{
    //     $data=[
    //       'status'=>1,
    //       'msg'=>'删除失败啦！！',
    //     ];
    //   }
    //   return $data;
    }




}
