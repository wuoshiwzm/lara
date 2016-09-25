<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Model\Category;
use Illuminate\Support\Facades\Input;
use App\Http\Model\Article;
use Illuminate\Support\Facades\Validator;


class ArticleController extends CommonController
{


    public function index(){
      $data = Article::orderBy('art_id','desc')->paginate(8);
      return view('admin.article.index',compact('data'));
    }

    //  添加文章  admin/article/create
    public function create(){
      $data=(new Category)->tree();


      return view('admin.article.add',compact('data'));
    }

    // 添加分类提交 POST   admin/category    admin.category.store
    public function store(){
      $input = Input::except('_token');
      $input['art_time']= time();


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
        $result = Article::create($input);
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


      // GET|HEAD   编辑文章  | admin/article/{article}/edit
      public function edit($art_id){
        // $field = Article::where('art_id',$art_id)->first();
        $field = Article::find($art_id);
        $data=(new Category)->tree();
        return view('admin.article.edit',compact('field','data'));
      }


      public function update($art_id){
        $input = Input::except('_method','_token');

        $result = Article::where('art_id',$art_id)->update($input);

        if($result){
          return redirect('admin/category');
        }else{
          return back()->with('errors','文章更新失败');
        }

      }


      public function destroy($art_id){



        $result = Article::where('art_id',$art_id)->delete();
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
