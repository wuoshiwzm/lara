<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Model\Category;
use Illuminate\Support\Facades\Input;
use App\Http\Model\Media;
use Illuminate\Support\Facades\Validator;




class MediaController extends CommonController
{
    public function index(){
      echo "media - index";
    }


    //  添加媒体信息  admin/media/create
    public function create(){
      $data=(new Category)->adminCate();
      return view('admin.media.add',compact('data'));
    }



    // 提交媒体信息 POST   admin.media.store
    public function store(){
      $input = Input::except('_token');
      $input['media_time']= time();
      if($input){
        $rules=[
          'media_title'=>'required',
          'media_content'=>'required',
        ];
        $message=[
          'media_content.required'=>'媒体信息内容必填',
          'media_title.required'=>'媒体信息标题必填',
        ];
        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
          $result = Article::create($input);
          if($result){
            return redirect('admin/article/create');
          }else{
            return back()->with('errors','媒体信息添加失败！');
          }
        }else{
          return back()->withErrors($validator);
          }
      }
    }

    // GET|HEAD   编辑媒体信息  | admin/media/{media}/edit
    public function edit($media_id){
      // $field = Article::where('art_id',$art_id)->first();
      $field = Media::find($media_id);
      $data=(new Category)->tree();
      return view('admin.article.edit',compact('field','data'));
    }

    //更新媒体信息  | admin/media/update
    public function update($media_id){
      $input = Input::except('_method','_token');
      $result = Article::where('media_id',$media_id)->update($input);
      if($result){
        return redirect('admin/media');
      }else{
        return back()->with('errors','媒体信息更新失败');
      }

    }


    public function destroy($media_id){
      $result = Article::where('media_id',$media_id)->delete();
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
