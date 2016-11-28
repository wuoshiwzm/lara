<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Model\Category2;
use Illuminate\Support\Facades\Input;
use App\Http\Model\Article2;
use App\Http\Model\Articleadd;
use App\Http\Model\Company;
use App\Http\Model\User;
use Illuminate\Support\Facades\Validator;


class MemberArticleController2 extends CommonController
{


    public function index(){
      $user_id = session('user')->user_id;
      // dd($user_id);
      $data = Article2::where('user_id',$user_id)->orderBy('art_id','desc')->paginate(8);
      return view('member.article2.index',compact('data'));
    }

    //  添加文章  admin/article/create
    public function create(){
      $categorys = (new Category2)->adminCate();
      return view('member.add_service.choose_cate2',compact('categorys'));
    }


    public function cre($cate_id){
      //get the id for the info form 对应针对表单的类型  户外  地铁  等类型。。。
      $cate_articleadd_id = Category2::where('cate_id',$cate_id)->select('cate_articleadd_id')->first()['cate_articleadd_id'];
      $cate_name= Category2::where('cate_id',$cate_id)->select('cate_name')->first()['cate_name'];
      $articleadd_name =Articleadd::where('articleadd_id',$cate_articleadd_id)->first()['articleadd_name'];
      // dd(session('user'));
      $company_name = Company::where('user_id',session('user')->user_id)->first()['company_name'];

      return view('member.add_service.add_'.$cate_articleadd_id,compact('cate_name','articleadd_name','cate_id','company_name'));
    }

    public function show(){}


    // 添加分类提交 POST   admin/category    admin.category.store
    public function store(){

      $user_id = session('user')->user_id;
      $input = Input::except('_token');
      // dd($input);

      $input['user_id'] = $user_id;
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
        $result = Article2::create($input);
        if($result){
          return redirect('member/article2');
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
        // $field = Article2::where('art_id',$art_id)->first();
        $field = Article2::find($art_id);
        $data=(new Category2)->tree();
        return view('member.add_service.edit2',compact('field','data'));
      }


      public function update($art_id){
        $input = Input::except('_method','_token');

        $result = Article2::where('art_id',$art_id)->update($input);

        if($result){
          return redirect('member/article2');
        }else{
          return back()->with('errors','文章更新失败');
        }
      }


      public function destroy($art_id){

        $result = Article2::where('art_id',$art_id)->delete();
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
