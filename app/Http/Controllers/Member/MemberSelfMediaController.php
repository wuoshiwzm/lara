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

class MemberSelfMediaController extends CommonController
{

    private $user_id;

    public function __construct()
    {
        $this->user_id = \Session::get('user')->user_id;

//        dd($this->user_id);

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $data = SelfMedia::where('user_id', $this->user_id)->orderBy('media_id', 'desc')->paginate(8);
        return view('member.self_media.index', compact('data'));
    }

    /**
     *
     */
    public function show()
    {

    }

    /**
     * @param $media_id
     * @return array
     * 删除文章
     */
    public function destroy($media_id){

        $result = SelfMedia::where('media_id',$media_id)->delete();
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


}