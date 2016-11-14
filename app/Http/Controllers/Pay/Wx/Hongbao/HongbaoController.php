<?php
namespace App\Http\Controllers\Pay\Wx\Hongbao;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HongbaoController extends Controller
{

  function index(){
    // echo "index";
    $test = new Test();
    // dd($test);
    $test->showi();
  }
}
