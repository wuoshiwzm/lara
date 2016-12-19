<?php
namespace App\Http\Controllers\Pay\Wx\Scanpay;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

/**
 *GET localhost/youge/blog/public/File/getQrcode
 *
 *获取付款二维码url的参数
 *
 */

require_once app_path() . "/Http/Wxpay/lib/WxPay.Api.php";
require_once app_path() . "/Http/Wxpay/example/WxPay.NativePay.php";


class ScanpayController extends Controller
{


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 付款页面
     */
    function index()
    {
        return view('admin.payment.wxpay');
    }

    /**
     * @return string
     */
    function setPayment()
    {
//        dd(Input::all());


        $amount = Input::get('amount');
        $userBalance = Input::get('userBalance');
        $username = \Session::get('user')->user_name;
        $url = $this->getQrcode($amount,$userBalance,$username);
        $url = "<img src=$url>";

        return $url;
    }

    /**
     * @param $mount
     * @param $username
     * @return string
     */
    public function getQrcode($mount, $userBalance,$username)
    {

        // $file_id = $request->input('file_id', '');
        // $out_trade_no = WxPayConfig::MCHID . date("YmdHis") . $file_id;

        //get the millisecond of now to generate $out_trade_no
        list($msec, $sec) = explode(' ', microtime());
        $out_trade_no = $sec . intval($msec * 1000);
        //我的out_trade_no是这么做的 由于我的file_id（就是我的商家订单）是唯一的，所以无论如何这个结果都是唯一的
        $notify = new \NativePay();
        $input = new \WxPayUnifiedOrder();
        $input->SetBody("支付无穷大哟");
        $input->SetAttach($username);
        $input->SetOut_trade_no($out_trade_no);
        $input->SetTotal_fee("$mount".'|'."$userBalance");
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetGoods_tag("test");
        //这里设置支付成功后的回调接口，不能有参数。
        $input->SetNotify_url("http://adbangbang.com/scanpay_callback890707asd89asdfasd897asd897jkjkzxcuioqwejkr89/");

        $input->SetTrade_type("NATIVE");
        $input->SetProduct_id("123456789");
        $result = $notify->GetPayUrl($input);
        $url = $result["code_url"];
        //这段是把out_trade_no和要处理的订单关联起来
        return "http://paysdk.weixin.qq.com/example/qrcode.php?data=" . $url;

    }

    /**
     * @param $data
     * @param $msg
     * @return bool
     */
    public function callback($data, &$msg)
    {

        //echo "处理回调";
        Log::DEBUG("call back:" . json_encode($data));


        $res = file_get_contents("php://input");
        $disk = Storage::disk('wxpay');
        // $contents = $disk->get('file.jpg')
        // $contents = Storage::disk('wxpay')->get('wxpay.txt');
        $contents = $disk->append('wxpay.txt', $res);

        // dd($contents);
//        die();


        dd(file_get_contents("php://input"));

        //echo "处理回调";
        Log::DEBUG("call back:" . json_encode($data));

        if (!array_key_exists("openid", $data) ||
            !array_key_exists("product_id", $data)
        ) {
            $msg = "回调数据异常";
            return false;
        }

        $openid = $data["openid"];
        $product_id = $data["product_id"];

        //统一下单
        $result = $this->unifiedorder($openid, $product_id);
        if (!array_key_exists("appid", $result) ||
            !array_key_exists("mch_id", $result) ||
            !array_key_exists("prepay_id", $result)
        ) {
            $msg = "统一下单失败";
            return false;
        }

        $this->SetData("appid", $result["appid"]);
        $this->SetData("mch_id", $result["mch_id"]);
        $this->SetData("nonce_str", WxPayApi::getNonceStr());
        $this->SetData("prepay_id", $result["prepay_id"]);
        $this->SetData("result_code", "SUCCESS");
        $this->SetData("err_code_des", "OK");
        return true;

    }
}
