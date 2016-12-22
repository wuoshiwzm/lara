<?php

namespace App\Http\Controllers\Home;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Http\Model\SelfMedia;
use App\Http\Model\User;
use App\Http\Model\ShareRec;
use App\Http\Controllers\Home\CommonController;

class SelfMediaController extends CommonController
{


    /**
     * @return mixed
     */
    public function index()
    {


        //the city where the user is in
        // dd($this->getCity($_SERVER['REMOTE_ADDR']));
        $countryNow = $this->getCity($_SERVER['REMOTE_ADDR'])->country;
        $provinceNow = $this->getCity($_SERVER['REMOTE_ADDR'])->province;
        $cityNow = $this->getCity($_SERVER['REMOTE_ADDR'])->city;


        //the city and province where the news request

        //1.the city column is empty and the province column is filled means to check the province
        $self_medias_province = SelfMedia::leftJoin('user', 'self_media.user_id', '=', 'user.user_id')
            ->where('user_balance', '>', 2)
            ->where('media_city', '')
            ->where('media_province', '!=', '')
            ->where('media_province', 'like', '%' . $provinceNow . '%')
            ->select('self_media.*', 'user.user_name')
            ->get();

        // dd($self_medias_province);
        //2.the city column is filled and the province column is filled   means the media is tobe checked iwth city and province
        $self_medias_city = SelfMedia::leftJoin('user', 'self_media.user_id', '=', 'user.user_id')
            ->where('user_balance', '>', 2)
            ->where('media_city', '!=', '')
            ->where('media_province', '!=', '')
            ->where('media_province', 'like', '%' . $provinceNow . '%')
            ->where('media_city', 'like', '%' . $cityNow . '%')
            ->select('self_media.*', 'user.user_name')
            ->get();

        //3.the city column is empty and the province column is empty too means the media is for the whole country to view
        $self_medias_country = SelfMedia::leftJoin('user', 'self_media.user_id', '=', 'user.user_id')
            ->where('user_balance', '>', 2)
            ->where('media_city', '')
            ->where('media_province', '')
            ->select('self_media.*', 'user.user_name')
            ->get();


        $self_medias = array_merge($self_medias_country->toArray(),
            $self_medias_city->toArray(),
            $self_medias_province->toArray());
        $self_medias = $this->arrSort($self_medias, 'created_at', SORT_DESC, SORT_NATURAL);

        //分享数排行

        foreach ($self_medias as $k => $media) {
            $shareTimes = ShareRec::where('media_id', $media['media_id'])->count();
            $self_medias[$k] = array_merge($media, array('shareTimes' => $shareTimes));
        }

        $topShareMedia = $this->arrSort($self_medias, 'shareTimes', SORT_DESC, SORT_NUMERIC);

        if(count($topShareMedia)>8){
            $topShareMedia = array_slice($topShareMedia,0,0);
        }elseif (count($topShareMedia)<8){
            $topShareMedia = array_slice($self_medias,0,8);
        };

        //推荐
        foreach ($self_medias as $k => $media) {
            if($media['show'] == 2){
                $pushMedia[] = $media;
            }
        }

        return view('home.self_media')
            ->with('self_medias', $self_medias)
            ->with('topShareMedia',$topShareMedia)
            ->with('pushMedia',$pushMedia);
    }

    /**
     * @return array
     */
    public function add()
    {
        $input = Input::all();
        //check if the user is login
        $user = session('user');
        if (!$user) {
            //0 means user need to login
            $data = [
                'status' => 0,
                'msg' => '你未登录，请先登录再发送'
            ];
            return $data;
        } elseif (!$input['content']) {
            //1 means the content is empty
            $data = [
                'status' => 1,
                'msg' => '发送内容不能为空'

            ];
            return $data;
        } elseif ($user['user_balance'] <= 2) {
            //2 means the balance is empty need to recharge
            $data = [
                'status' => 2,
                'msg' => '您账户余额不足，请充值'
            ];
            return $data;
        } else {
            //4 succeed and notice user that each twitte will charge him 1 currency
            $data = [
                'status' => 4,
                'msg' => '已经成功发送，奇迹即将发生！'
            ];

            $res['user_id'] = $user['user_id'];
            $res['content'] = $input['content'];
            $res['media_province'] = $input['media_province'];
            $res['media_city'] = $input['media_city'];
            $res['title'] = $input['title'];

            SelfMedia::create($res);
            return $data;
        }

        // dd($user['user_balance']);
    }


    /**
     * @param $url
     * @param array $post_data
     * @param bool $verbose
     * @param bool $ref_url
     * @param bool $cookie_location
     * @param bool $return_transfer
     * @return bool
     */
    function curl_get_contents($url, array $post_data = array(), $verbose = false, $ref_url = false, $cookie_location = false, $return_transfer = true)
    {
        $return_val = false;

        $pointer = curl_init();

        curl_setopt($pointer, CURLOPT_URL, $url);
        curl_setopt($pointer, CURLOPT_TIMEOUT, 40);
        curl_setopt($pointer, CURLOPT_RETURNTRANSFER, $return_transfer);
        curl_setopt($pointer, CURLOPT_USERAGENT, "Mozilla / 5.0 (Windows; U; Windows NT 6.1; en - US) AppleWebKit / 534.10 (KHTML, like Gecko) Chrome / 8.0.552.28 Safari / 534.10");
        curl_setopt($pointer, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($pointer, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($pointer, CURLOPT_HEADER, false);
        curl_setopt($pointer, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($pointer, CURLOPT_AUTOREFERER, true);

        if ($cookie_location !== false) {
            curl_setopt($pointer, CURLOPT_COOKIEJAR, $cookie_location);
            curl_setopt($pointer, CURLOPT_COOKIEFILE, $cookie_location);
            curl_setopt($pointer, CURLOPT_COOKIE, session_name() . '=' . session_id());
        }

        if ($verbose !== false) {
            $verbose_pointer = fopen($verbose, 'w');
            curl_setopt($pointer, CURLOPT_VERBOSE, true);
            curl_setopt($pointer, CURLOPT_STDERR, $verbose_pointer);
        }

        if ($ref_url !== false) {
            curl_setopt($pointer, CURLOPT_REFERER, $ref_url);
        }

        if (count($post_data) > 0) {
            curl_setopt($pointer, CURLOPT_POST, true);
            curl_setopt($pointer, CURLOPT_POSTFIELDS, $post_data);
        }

        $return_val = curl_exec($pointer);

        $http_code = curl_getinfo($pointer, CURLINFO_HTTP_CODE);

        if ($http_code == 404) {
            return false;
        }

        curl_close($pointer);
    }

    /**
     * @param $ip
     * @return mixed
     */
    private function getCity($ip)
    {
        header("content-type:text/html;charset = utf-8");
        date_default_timezone_set("Asia/Shanghai");
        error_reporting(0);
        // 根据IP判断城市

        $url = "http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json&ip=$ip";
        $address = file_get_contents($url);
        return $address_arr = json_decode($address);

        //返回对象，需要转换为数组
        // return $address_arr = json_decode($address);　
    }


    /**
     * @param $arrays
     * @param $sort_key
     * @param int $sort_order
     * @param int $sort_type
     * @return array|bool
     * 数组排序
     */
    private function arrSort($arrays, $sort_key, $sort_order = SORT_DESC, $sort_type = SORT_NUMERIC)
    {
        if (is_array($arrays)) {
            foreach ($arrays as $array) {
                if (is_array($array)) {
                    $key_arrays[] = $array[$sort_key];
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }

        array_multisort($key_arrays, $sort_order, $sort_type, $arrays);
        return $arrays;
    }


}


?>
