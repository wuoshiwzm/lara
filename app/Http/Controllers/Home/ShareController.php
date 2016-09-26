<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Home\CommonController;

class ShareController extends CommonController
{
    function index(){
      
      return view('home.share');
    }
}
