<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Http\Model\Category;
use App\Http\Model\Articleadd;
use Illuminate\Support\Facades\Validator;

class CategoryController extends CommonController
{
    // 分类列表GET|HEAD                       | admin/category                 | admin.category.index
    public function index(){

        $categorys = (new Category)->adminCate();

        $articleadd = Articleadd::all();
        // dd($articleadd);
        return view('admin.category.index')
        ->with('data',$categorys)
        ->with('articleadd',$articleadd);
    }

    // GET|HEAD   编辑分类  | admin/category/{category}/edit
    public function edit($cate_id){
      $field = Category::find($cate_id);
      $data = Category::where('cate_pid',0)->get();
      return view('admin.category.edit',compact('field','data'));
    }

    //PUT|PATCH     | admin/category/{category}
    public function update($cate_id){
      $input = Input::except('_method','_token');
      $result = Category::where('cate_id',$cate_id)->update($input);

      if($result){
        return redirect('admin/category');
      }else{
        return back()->with('errors','分类信息更新失败');
      }

    }


    public function changeOrder(){
      $input = Input::all();
      $cate = Category::find($input['cate_id']);
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

      // dd($input);
       $cate = Category::find($input['cate_id']);
       $cate->cate_articleadd_id=$input['articleadd'];
       $result = $cate->update();

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




    // 添加分类提交 POST   admin/category    admin.category.store
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
        $result =   Category::create($input);
        if($result){return redirect('admin/category');}
        else{return back()->with('errors','生成分类失败');}
        }else{
          return back()->withErrors($validator);
        }


    }
  }


    //  添加分类GET|HEAD     | admin/category/create
    public function create(){
      // $data = Category::where('cate_pid',0)->get();
       $data = Category::get();

    return view('admin/category/add',compact('data',$data));
    }

    // GET|HEAD         | admin/category/{category}
    public function show(){

    }

    //DELETE    删除分类 | admin/category/{category}
    public function destroy($cate_id){

      // $test = Category::where('cate_pid',$cate_id)->count();
      // if($test){
      //   return $data=[
      //     'status'=>1,
      //     'msg'=>'有子分类 不能删除！',
      //   ];
      // }
      $result = Category::where('cate_id',$cate_id)->delete();
      Category::where('cate_pid',$cate_id)->update(['cate_pid'=>0]);
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
