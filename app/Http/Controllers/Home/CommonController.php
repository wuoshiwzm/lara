<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Navs;
use Illuminate\Support\Facades\View;
use App\Http\Model\Article;


class CommonController extends Controller
{
    public function __construct(){
      $navs= Navs::all();

      //the  5 article most views
      $hot = Article::orderBy('art_view','desc')->take(5)->get();


      view::share('navs',$navs);
      view::share('hot',$hot);
      // view::share('new',$new);
    }
}
