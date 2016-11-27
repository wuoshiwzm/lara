<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Model\Category;
use Illuminate\Support\Facades\Input;
use App\Http\Model\Article1;
use App\Http\Model\Recm1;

use App\Http\Model\Company;
use Illuminate\Support\Facades\Validator;

//针对广告文章的推荐 每个栏目为5个文章
class RecmommendController1 extends CommonController
{


    public function index(){
      // $data = Article::orderBy('art_id','desc')->paginate(8);
      $data = Recm1::orderBy('recm_order','asc')->paginate(8);
      return view('admin.recm1.index',compact('data'));
    }

    //  添加文章  admin/article/create
    public function create(){

      $articles = Article1::orderBy('art_id','desc')->get();
      return view('admin.recm1.add',compact('articles'));
    }


    public function show(){}


    // 添加分类提交 POST   admin/category    admin.category.store
    public function store(){

      // return back()->withInput();
      $input = Input::except('_token');

      // dd($input);
      if($input){
        $rules=[
          'recm_name'=>'required',
          'recm_content'=>'required',
        ];
        $message=[
          'recm_name.required'=>'标题必填',
          'recm_content.required'=>'内容必填',
        ];
      $validator = Validator::make($input,$rules,$message);
      if($validator->passes()){
        $result = Recm1::create($input);
        if($result){
          return redirect('admin/recm1');
        }else{
          return back()->with('errors','添加失败！');
        }
        }else{
          return back()->withErrors($validator);
        }
    }
  }


      // GET|HEAD   编辑文章  | admin/article/{article}/edit
      public function edit($recm_id){
        // dd($recm_id);
        $articles = Article1::orderBy('art_id','desc')->get();
        $field = Recm1::find($recm_id);

        return view('admin.recm1.edit',compact('field','articles'));
      }


      public function update($recm_id){
        $input = Input::except('_method','_token');
        $result = Recm1::where('recm_id',$recm_id)->update($input);

        if($result){
          return redirect('admin/recm1');
        }else{
          return back()->with('errors','文章更新失败');
        }
      }


      public function destroy($recm_id){

        $result = Recm1::where('recm_id',$recm_id)->delete();
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

      public function changeOrder(){

        $input = Input::except('_token');
        $recm = Recm1::find($input['recm_id']);
        $recm->recm_order=$input['recm_order'];
        $result =   $recm->update();
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



}
