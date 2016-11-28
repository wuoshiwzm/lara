<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Model\Category;
use Illuminate\Support\Facades\Input;
use App\Http\Model\Offer;
use Illuminate\Support\Facades\Validator;

//针对广告文章的推荐 每个栏目为5个文章
class MemberOfferController extends CommonController
{


    public function index(){
      // $data = Article::orderBy('art_id','desc')->paginate(8);
      $user_id = session('user')->user_id;
      $data = Offer::where('user_id',$user_id)->orderBy('offer_id','desc')->paginate(8);
      return view('member.offer.index',compact('data'));
    }


    public function create(){
      $categorys = Category::all();
      return view('member.offer.add',compact('categorys'));
    }


    public function show(){}


    // 添加分类提交 POST   admin/category    admin.category.store
    public function store(){

      $user_id = session('user')->user_id;
      $input = Input::except('_token');
      $input['user_id'] = $user_id;
      if($input){
        $rules=[
          'offer_title'=>'required',
          'offer_cate_id'=>'required',
          'offer_content'=>'required',
        ];
        $message=[
          'offer_title.required'=>'标题必填',
          'offer_content.required'=>'内容必填',
          'offer_cate_id.required'=>'类型必填',
        ];
      $validator = Validator::make($input,$rules,$message);
      if($validator->passes()){
        $result = Offer::create($input);
        if($result){
          return redirect('member/offer');
        }else{
          return back()->with('errors','添加失败！');
        }
        }else{
          return back()->withErrors($validator);
        }
    }
  }


      // GET|HEAD   编辑文章  | admin/article/{article}/edit
      public function edit($offer_id){
        $user_id = session('user')->user_id;

        $offer = Offer::where('user_id',$user_id)->find($offer_id);
        return view('member.offer.edit',compact('offer'));
      }


      public function update($offer_id){
        $user_id = session('user')->user_id;
        $input = Input::except('_method','_token');
        // dd($input);
        $result = Offer::where('offer_id',$offer_id)->where('user_id',$user_id)->update($input);

        if($result){
          return redirect('member/offer');
        }else{
          return back()->with('errors','文章更新失败');
        }
      }


      public function destroy($offer_id){

        $result = Offer::where('offer_id',$offer_id)->delete();
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
        dd('无排序功能！');
        $input = Input::except('_token');
        $offer = Offer::find($input['offer_id']);
        $offer->offer_order=$input['offer_order'];
        $result =   $offer->update();
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
