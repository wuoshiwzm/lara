<?php
/**
 * Created by PhpStorm.
 * User: wuosh
 * Date: 2016/12/19
 * Time: 15:27
 */

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Model\SelfMedia;
use Illuminate\Support\Facades\Input;
use App\Http\Model\Offer;
use Illuminate\Support\Facades\Validator;

class MemberSelfMediaController
{

    private $user_id;
    public function __construct()
    {
        $this->user_id = Session::get('member')->user_id;

        dd($this->user_id);

    }

    public function index()
    {
        
    }
}