<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Http\Model\Category2;
use App\Http\Model\Articleadd2;
use Illuminate\Support\Facades\Validator;

class CategoryController2 extends CommonController
{
    // 分类列表GET|HEAD                       | admin/Category2                 | admin.Category2.index
    public function index(){

        $categorys = (new Category2)->adminCate();

        $articleadd = Articleadd2::all();
        // dd($articleadd);
        return view('admin.category2.index')
        ->with('data',$categorys)
        ->with('articleadd',$articleadd);
    }

    // GET|HEAD   编辑分类  | admin/Category2/{Category2}/edit
    public function edit($cate_id){
      $field = Category2::find($cate_id);
      // dd($field);
      $data = Category2::where('cate_pid',0)->get();
      return view('admin.category2.edit',compact('field','data'));
    }

    //PUT|PATCH     | admin/Category2/{Category2}
    public function update($cate_id){
      $input = Input::except('_method','_token');
      dd($input);
      $result = Category2::where('cate_id',$cate_id)->update($input);

      if($result){
        return redirect('admin/category2');
      }else{
        return back()->with('errors','分类信息更新失败');
      }

    }


    public function changeOrder(){
      $input = Input::all();
      $cate = Category2::find($input['cate_id']);
      $cate->cate_order=$input['cate_order'];
      $result =   $cate->update();
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


    public function changearticleadd(){
      $input = Input::except('_token');

       $cate = Category2::find($input['cate_id']);
       $cate->cate_articleadd_id=$input['articleadd'];
       $result = $cate->update();
// dd($cate);

      if($result){
        $data=[
          'status'=>0,
          'msg'=>'更改成功！',
        ];
      }else{
        $data=[
          'status'=>1,
          'msg'=>'更改失败！',
        ];
      }
      return $data;
    }




    // 添加分类提交 POST   admin/Category2    admin.Category2.store
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
        $result =   Category2::create($input);
        if($result){return redirect('admin/category2');}
        else{return back()->with('errors','生成分类失败');}
        }else{
          return back()->withErrors($validator);
        }


    }
  }


    //  添加分类GET|HEAD     | admin/Category2/create
    public function create(){
      // $data = Category2::where('cate_pid',0)->get();
       $data = Category2::get();

    return view('admin/category2/add',compact('data',$data));
    }

    // GET|HEAD         | admin/Category2/{Category2}
    public function show(){

    }

    //DELETE    删除分类 | admin/Category2/{Category2}
    public function destroy($cate_id){

      $result = Category2::where('cate_id',$cate_id)->delete();
      Category2::where('cate_pid',$cate_id)->update(['cate_pid'=>0]);
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
