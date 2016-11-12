<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Http\Model\Category1;
use App\Http\Model\Articleadd1;
use Illuminate\Support\Facades\Validator;

class CategoryController1 extends CommonController
{
    // 分类列表GET|HEAD                       | admin/Category1                 | admin.Category1.index
    public function index(){

        $categorys = (new Category1)->adminCate();

        $articleadd = Articleadd1::all();
        // dd($articleadd);
        return view('admin.category1.index')
        ->with('data',$categorys)
        ->with('articleadd',$articleadd);
    }

    // GET|HEAD   编辑分类  | admin/Category1/{Category1}/edit
    public function edit($cate_id){
      $field = Category1::find($cate_id);
      // dd($field);
      $data = Category1::where('cate_pid',0)->get();
      return view('admin.category1.edit',compact('field','data'));
    }

    //PUT|PATCH     | admin/Category1/{Category1}
    public function update($cate_id){
      $input = Input::except('_method','_token');
      // dd($input);
      $result = Category1::where('cate_id',$cate_id)->update($input);

      if($result){
        return redirect('admin/category1');
      }else{
        return back()->with('errors','分类信息更新失败');
      }

    }


    public function changeOrder(){
      $input = Input::all();
      $cate = Category1::find($input['cate_id']);
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

       $cate = Category1::find($input['cate_id']);
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




    // 添加分类提交 POST   admin/Category1    admin.Category1.store
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
        $result =   Category1::create($input);
        if($result){return redirect('admin/category1');}
        else{return back()->with('errors','生成分类失败');}
        }else{
          return back()->withErrors($validator);
        }


    }
  }


    //  添加分类GET|HEAD     | admin/Category1/create
    public function create(){
      // $data = Category1::where('cate_pid',0)->get();
       $data = Category1::get();

    return view('admin/category1/add',compact('data',$data));
    }

    // GET|HEAD         | admin/Category1/{Category1}
    public function show(){

    }

    //DELETE    删除分类 | admin/Category1/{Category1}
    public function destroy($cate_id){

      $test = Category1::where('cate_pid',$cate_id)->count();
      if($test){
        return $data=[
          'status'=>1,
          'msg'=>'有子分类 不能删除！',
        ];
      }
      $result = Category1::where('cate_id',$cate_id)->delete();
      Category1::where('cate_pid',$cate_id)->update(['cate_pid'=>0]);
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
