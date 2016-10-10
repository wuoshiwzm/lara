<?php
namespace App\Http\Controllers\Home;
use App\Http\Model\Navs;
use App\Http\Model\Article;
use App\Http\Model\Links;
use App\Http\Model\Category;

class IndexController extends CommonController
{
  public function index(){

    $allCates = (new Category)->frontCate();
    // dd($allCates);
    // die("<hr>"."test category->frontCate");
    //the  6 article most views
    $pics = Article::orderBy('art_view','desc')->take(6)->get();

    //list for pics and article with pagination
    $data=Article::orderBy('art_time','desc')->paginate(5);

    //the latest articles
    // $new=Article::orderBy('art_time','desc')->take(8)->get();

    //the links
    $links = Links::orderBy('link_order','asc')->get();
    // the config settings ...

    return view('home/index',compact('allCates','pics','data','links'));
  }

  public function cate($cate_id){

    //highlight the cate you choose

    $allCates = (new Category)->frontCate();
    $allChild = (new Category)->scanChild(0);
    // $cate_id = $cate_id;
    array_shift($allChild);


    // foreach($allCate as $k=>$v){
    //   foreach($v as $a=>$b){
    //     if($b['cate_id']==$cate_id){
    //       echo "<h1>";
    //     }
    //
    //     echo "<span id=cates_".$b['cate_id']."/>";
    //     echo $b['cate_name']."　";
    //     echo "</span>";
    //     if($b['cate_id']==$cate_id){
    //       echo "</h1>";
    //     }
    //   }
    //   echo "<hr>";
    // }

    // return view('home/media_show',compact('allCates','allChild','cate_id'));

    // dd($allChild);
    // $children = (new Category)->scanChild($cate_id);
    // foreach($children as $k=>$v){
    //   echo $v['cate_name']."<br>";
    // }

    //the  4 article most views
    $data = Article::where('cate_id',$cate_id)->orderBy('art_view','desc')->paginate(4);

    // the child categorys
    $submenu = Category::where('cate_pid',$cate_id)->get();

    // increment the view time of categorys
    Category::where('cate_id',$cate_id)->increment('cate_view',1);


    $field = Category::find($cate_id);
    return view('home/media_show',compact('field','data','submenu','allCates','allChild','cate_id'));
  }

  public function article($art_id){
    $field = Article::Join('category','article.cate_id','=','category.cate_id')->where('art_id',$art_id)->first();
    $article['pre']= Article::where('art_id','<',$art_id)->orderBy('art_id','desc')->first();
    $article['next']= Article::where('art_id','>',$art_id)->orderBy('art_id','asc')->first();
    $data = Article::where('cate_id',$field->cate_id)->orderBy('art_id','desc')->take(6)->get();

    //add view times
    Article::where('art_id',$art_id)->increment('art_view',1);

    return view('home/new',compact('field','article','data'));
  }
}
