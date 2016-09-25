<?php
namespace App\Http\Controllers\Home;
use App\Http\Model\Navs;
use App\Http\Model\Article;
use App\http\Model\Links;
use App\Http\Model\Category;
use Illuminate\Http\Request;

class TestController extends CommonController
{
  function index(){

    session(['key'=>'testUser.org']);

    \Session::put('key5', 'value5');
    \Session::put('key6', 'value6');

    // dd($value);
  }

  function index2(){
    $value = session()->all();
    dd($value);
  }


}
