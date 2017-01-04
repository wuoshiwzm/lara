<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Model\Category;
use Illuminate\Support\Facades\Input;
use App\Http\Model\News;
use Illuminate\Support\Facades\Validator;

//针对广告文章的推荐 每个栏目为5个文章
class NewsController extends CommonController
{


    public function index()
    {
        // $data = Article::orderBy('art_id','desc')->paginate(8);

        $data = News::orderBy('news_id', 'desc');
        if( Input::get('search') ){
            $search = Input::get('search');
            $data = $data->where('news_title','like','%'.$search.'%')
                ->orwhere('news_content','like','%'.$search.'%');
        }
        $data = $data->paginate(8);
        return view('admin.news.index', compact('data'));
    }
    //  添加文章  admin/article/create
    public function create()
    {

        return view('admin.news.add');
    }


    public function show()
    {
    }


    // 添加分类提交 POST   admin/category    admin.category.store
    public function store()
    {
        // return back()->withInput();
        $input = Input::except('_token');

        // dd($input);
        if ($input) {
            $rules = [
                'news_title' => 'required',
                'news_content' => 'required',
            ];
            $message = [
                'news_title.required' => '标题必填',
                'news_content.required' => '内容必填',
            ];
            $validator = Validator::make($input, $rules, $message);
            if ($validator->passes()) {
                $result = News::create($input);
                if ($result) {
                    return redirect('admin/news');
                } else {
                    return back()->with('errors', '添加失败！');
                }
            } else {
                return back()->withErrors($validator);
            }
        }
    }


    // GET|HEAD   编辑文章  | admin/article/{article}/edit
    public function edit($news_id)
    {
        // dd($recm_id);

        $news = News::find($news_id);
        return view('admin.news.edit', compact('news'));
    }


    public function update($news_id)
    {
        $input = Input::except('_method', '_token');
        // dd($input);
        $result = News::where('news_id', $news_id)->update($input);

        if ($result) {
            return redirect('admin/news');
        } else {
            return back()->with('errors', '文章更新失败');
        }
    }


    public function destroy($news_id)
    {


        $result = News::where('news_id', $news_id)->delete();
        if ($result) {
            $data = [
                'status' => 0,
                'msg' => '删除成功！',
            ];
        } else {
            $data = [
                'status' => 1,
                'msg' => '删除失败啦！！',
            ];
        }
        return $data;
    }

    public function changeOrder()
    {

        $input = Input::except('_token');
        $recm = News::find($input['recm_id']);
        $recm->recm_order = $input['recm_order'];
        $result = $recm->update();
        if ($result) {
            $data = [
                'status' => 0,
                'msg' => '更改排序 成功！',
            ];
        } else {
            $data = [
                'status' => 1,
                'msg' => '更改排序 失败！',
            ];
        }
        return $data;
    }


}
