<?php
namespace App\Http\Controllers\Home;
use App\Http\Model\Navs;
use App\Http\Model\Article;
use App\Http\Model\Article1;
use App\Http\Model\Article2;
use App\Http\Model\Links;
use App\Http\Model\Category;
use App\Http\Model\Category1;
use App\Http\Model\Category2;
use App\Http\Model\Mpic;
use App\Http\Model\Spic;
use App\Http\Model\MainMedia;
use App\Http\Model\Company;


class IndexController extends CommonController
{



  public function index(){
    //大横幅
    $mpic = Mpic::orderBy('mpic_order')->get();
    //小横幅
    $spic = Spic::orderBy('spic_order')->get();
    //最新入驻公司
    $company = Company::orderBy('updated_at')->limit(7)->get();
    //主流媒体
    $main_media =MainMedia::orderBy('main_media_order')->get();


    return view('home.index')
    ->with('mpic',$mpic)
    ->with('spic',$spic)
    ->with('company',$company)
    ->with('main_media',$main_media);
  }

  public function dcate(){
    $cate_id = Category::first()->cate_id;
    return $this->cate($cate_id);
  }

  public function dcate1(){
    $cate_id = Category1::first()->cate_id;
    return $this->cate1($cate_id);
  }

  public function dcate2(){
    $cate_id = Category2::first()->cate_id;
    return $this->cate2($cate_id);
  }

  public function cate($cate_id){

    //highlight the  cate you choose
    $cates = (new Category)->ccates();

    $allCates = (new Category)->frontCate();

    $allChild = (new Category)->scanChild($cate_id);
    $childId = [];
    foreach ($allChild as $k => $v) {
      $childId[]=$v['cate_id'];
    }
    $data = Article::whereIn('cate_id',$childId)->orderBy('art_view','desc')->paginate(10);
    //the 4 article most views


    // the child categorys
    $submenu = Category::where('cate_pid',$cate_id)->get();

    // increment the view time of categorys
    Category::where('cate_id',$cate_id)->increment('cate_view',1);

    $field = Category::find($cate_id);
    return view('home/cate_show',compact('field','data','submenu','allCates','allChild','cate_id'));
  }

  public function cate1($cate_id = null){

    //highlight the  cate you choose
    $allCates = (new Category1)->frontCate();
    $allChild = (new Category1)->scanChild($cate_id);
    // array_shift($allChild);
    $childId = [];
    foreach ($allChild as $k => $v) {
      $childId[]=$v['cate_id'];
    }
    $data = Article1::whereIn('cate_id',$childId)->orderBy('art_view','desc')->paginate(10);

    // the child categorys
    $submenu = Category1::where('cate_pid',$cate_id)->get();

    // increment the view time of categorys
    Category1::where('cate_id',$cate_id)->increment('cate_view',1);

    $field = Category1::find($cate_id);

    return view('home/cate_show1',compact('field','data','submenu','allCates','allChild','cate_id'));
  }

  public function cate2($cate_id = null){

    //highlight the  cate you choose
    $allCates = (new Category2)->frontCate();
    $allChild = (new Category2)->scanChild($cate_id);
    $childId = [];
    foreach ($allChild as $k => $v) {
      $childId[]=$v['cate_id'];
    }
    $data = Article2::whereIn('cate_id',$childId)->orderBy('art_view','desc')->paginate(10);

    // the child categorys
    $submenu = Category2::where('cate_pid',$cate_id)->get();

    // increment the view time of categorys
    Category2::where('cate_id',$cate_id)->increment('cate_view',1);

    $field = Category2::find($cate_id);
    // dd($field);
    return view('home/cate_show2',compact('field','data','submenu','allCates','allChild','cate_id'));
  }



  public function article($art_id){
    $field = Article::Join('category','article.cate_id','=','category.cate_id')->where('art_id',$art_id)->first();
    $cate_info = Category::find($field->cate_id);
    $article['pre']= Article::where('art_id','<',$art_id)->orderBy('art_id','desc')->first();
    $article['next']= Article::where('art_id','>',$art_id)->orderBy('art_id','asc')->first();
    $data = Article::where('cate_id',$field->cate_id)->orderBy('art_view','desc')->take(6)->get();
    $new = Article::where('cate_id',$field->cate_id)->orderBy('art_id','desc')->take(6)->get();

    //add view times
    Article::where('art_id',$art_id)->increment('art_view',1);

    return view('home/new',compact('field','article','data','new','cate_info'));
  }

  public function article1($art_id){
    $field = Article1::Join('category1','article1.cate_id','=','category1.cate_id')->where('art_id',$art_id)->first();
    // dd($field);
    $cate_info = Category1::find($field->cate_id);
    $article['pre']= Article1::where('art_id','<',$art_id)->orderBy('art_id','desc')->first();
    $article['next']= Article1::where('art_id','>',$art_id)->orderBy('art_id','asc')->first();
    $data = Article1::where('cate_id',$field->cate_id)->orderBy('art_view','desc')->take(6)->get();
    $new = Article1::where('cate_id',$field->cate_id)->orderBy('art_id','desc')->take(6)->get();

    //add view times
    Article1::where('art_id',$art_id)->increment('art_view',1);

    return view('home/new1',compact('field','article','data','new','cate_info'));
  }


  public function article2($art_id){
    $field = Article2::Join('category2','article2.cate_id','=','category2.cate_id')->where('art_id',$art_id)->first();
    $cate_info = Category2::find($field->cate_id);
    $article['pre']= Article2::where('art_id','<',$art_id)->orderBy('art_id','desc')->first();
    $article['next']= Article2::where('art_id','>',$art_id)->orderBy('art_id','asc')->first();
    $data = Article2::where('cate_id',$field->cate_id)->orderBy('art_view','desc')->take(6)->get();
    $new = Article2::where('cate_id',$field->cate_id)->orderBy('art_id','desc')->take(6)->get();

    //add view times
    Article2::where('art_id',$art_id)->increment('art_view',1);

    return view('home/new2',compact('field','article','data','new','cate_info'));
  }
}
