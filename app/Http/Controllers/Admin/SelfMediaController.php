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
    }


    //  添加分类GET|HEAD     | admin/self_media/create
    public function create(){

    }


    // GET|HEAD   编辑分类  | admin/self_media/{self_media}/edit
    public function edit($cate_id){

    }

    //PUT|PATCH     | admin/self_media/{self_media}
    public function update($cate_id){


    }


    public function changeOrder(){

    }



    // 添加分类提交 POST   admin/self_media    admin.self_media.store
    public function store(){

  }



    // GET|HEAD         | admin/self_media/{self_media}
    public function show(){

    }

    //DELETE    删除分类 | admin/self_media/{self_media}
    public function destroy($media_id){

      $result = SelfMedia::where('media_id',$media_id)->delete();
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
