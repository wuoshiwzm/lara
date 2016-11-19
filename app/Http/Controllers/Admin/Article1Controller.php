<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Model\Category1;
use Illuminate\Support\Facades\Input;
use App\Http\Model\Article1;
use Illuminate\Support\Facades\Validator;


class Article1Controller extends CommonController
{


    public function index(){
      $data = Article1::orderBy('art_id','desc')->paginate(8);
      return view('admin.article.index',compact('data'));
    }

    //  添加文章  admin/article/create
    public function create(){

      die('pls call cre function!');
      $data=(new Category1)->tree();


      return view('admin.article.add',compact('data'));
    }


    public function cre($cate_id){
      //get the id for the info form
      $add_info =  Category1::where('cate_id',$cate_id)->select('cate_add_info')->first()['cate_add_info'];
      $cate_name= Category1::where('cate_id',$cate_id)->select('cate_name')->first()['cate_name'];

      // echo 'admin.article.add_'.$cate_id;
      // die();
      return view('admin.add_service.add_'.$add_info,compact('cate_name'));
    }

    public function show(){}


    // 添加分类提交 POST   admin/category    admin.category.store
    public function store(){
      // dd(Input::all());


      $input = Input::except('_token');
      // $input['art_time']= time();


      if($input){
        $rules=[
          'art_title'=>'required',
          'art_content'=>'required',
        ];
        $message=[
          'art_content.required'=>'文章内容必填',
          'art_title.required'=>'文章标题必填',
        ];
      $validator = Validator::make($input,$rules,$message);
      if($validator->passes()){
        $result = Article1::create($input);
        if($result){
          return redirect('admin/article/create');
        }else{
          return back()->with('errors','文章添加失败！');
        }
        }else{
          return back()->withErrors($validator);
        }
    }
  }


      // GET|HEAD   编辑文章  | admin/article1/{article}/edit
      public function edit($art_id){
        // $field = Article1::where('art_id',$art_id)->first();
        $field = Article1::find($art_id);
        $data=(new Category1)->tree();
        return view('admin.article.edit',compact('field','data'));
      }


      public function update($art_id){
        $input = Input::except('_method','_token');

        $result = Article1::where('art_id',$art_id)->update($input);

        if($result){
          return redirect('admin/category');
        }else{
          return back()->with('errors','文章更新失败');
        }

      }


      public function destroy($art_id){



        $result = Article1::where('art_id',$art_id)->delete();
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
