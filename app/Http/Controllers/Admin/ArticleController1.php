<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Model\Category1;
use Illuminate\Support\Facades\Input;
use App\Http\Model\Article1;
use App\Http\Model\Articleadd1;
use App\Http\Model\Company;
use Illuminate\Support\Facades\Validator;


class ArticleController1 extends CommonController
{


    public function index(){
      $data = Article1::orderBy('art_id','desc')->paginate(8);
      return view('admin.article1.index',compact('data'));
    }

    //  添加文章  admin/article1/create
    public function create(){

      $categorys = (new Category1)->adminCate();
      // die('pls call cre function!');
      return view('admin.add_service.choose_cate1',compact('categorys'));
    }


    public function cre($cate_id){
      //get the id for the info form
      $cate_articleadd_id = Category1::where('cate_id',$cate_id)->select('cate_articleadd_id')->first()['cate_articleadd_id'];
      $cate_name= Category1::where('cate_id',$cate_id)->select('cate_name')->first()['cate_name'];
      $articleadd_name =Articleadd1::where('articleadd_id',$cate_articleadd_id)->first()['articleadd_name'];
      $company_name = Company::where('user_id',session('company_id'))->first()['company_name'];

      return view('admin.add_service.add_'.$cate_articleadd_id,compact('cate_name','articleadd_name','cate_id','company_name'));
    }

    public function show(){}


    // 添加分类提交 POST   admin/Category1    admin.Category1.store
    public function store(){
      // dd(Input::all());

      $input = Input::except('_token');


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
          return redirect('admin/article1/create');
        }else{
          return back()->with('errors','文章添加失败！');
        }
        }else{
          return back()->withErrors($validator);
        }
    }
  }


      // GET|HEAD   编辑文章  | admin/article1/{article1}/edit
      public function edit($art_id){
        // $field = Article1::where('art_id',$art_id)->first();
        $field = Article1::find($art_id);
        $data=(new Category1)->tree();
        return view('admin.add_service.edit1',compact('field','data'));
      }


      public function update($art_id){
        $input = Input::except('_method','_token');

        $result = Article1::where('art_id',$art_id)->update($input);

        if($result){
          return redirect('admin/article1');
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
