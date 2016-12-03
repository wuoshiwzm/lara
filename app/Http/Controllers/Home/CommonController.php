<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Navs;
use App\Http\Model\PageBanner;
use Illuminate\Support\Facades\View;
use App\Http\Model\Article;


class CommonController extends Controller
{
    public function __construct(){
      $navs= Navs::orderBy('nav_order','asc')->get();

      //the  5 article most views
      $hot = Article::orderBy('art_view','desc')->take(5)->get();

      $page_banner =PageBanner::orderBy('page_banner_order')->first();
      view::share('navs',$navs);
      view::share('hot',$hot);
      view::share('page_banner',$page_banner);
      // view::share('new',$new);
    }
}
