<?php
namespace App\Http\Controllers\Pay\Wx\Scanpay;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

/**
 *GET localhost/youge/blog/public/File/getQrcode
 *
 *获取付款二维码url的参数
 *
 */
 // include_once("../conf/WxPay.pub.config.php");
 //    include_once("../lib/CommonUtilPub.php");
 //
require_once app_path()."/Http/Wxpay/example/Log.php";
// require_once app_path()."/Http/Wxpay/lib/WxpayServerPub.php";
require_once app_path()."/Http/Wxpay/lib/WxPay.Api.php";
require_once app_path()."/Http/Wxpay/example/WxPay.NativePay.php";



class ScanpayController extends Controller
{

    function index(){
      $url = $this->getQrcode(1);
      // $url = 'ww.baidu.com';
      echo '<img src = '.$url.'>';
    }



    //注意引入文件的路径
    // public function getQrcode(Request $request)
    public function getQrcode($mount)
    {
        // $file_id = $request->input('file_id', '');
        // $out_trade_no = WxPayConfig::MCHID . date("YmdHis") . $file_id;
        $out_trade_no = \WxPayConfig::MCHID . date("YmdHis");
        //我的out_trade_no是这么做的 由于我的file_id（就是我的商家订单）是唯一的，所以无论如何这个结果都是唯一的
        $notify = new \NativePay();
        $input = new \WxPayUnifiedOrder();
        $input->SetBody("支付无穷大");
        $input->SetAttach("L");
        $input->SetOut_trade_no($out_trade_no);
        $input->SetTotal_fee("$mount");
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetGoods_tag("test");
        $input->SetNotify_url("http://adbangbang/scanpay_callback");
        //这里设置支付成功后的回调接口，不能有参数。
        $input->SetTrade_type("NATIVE");
        $input->SetProduct_id("123456789");
        $result = $notify->GetPayUrl($input);

        $url = $result["code_url"];

        // $file = \File::where('id', $file_id)->first();
        // if (!empty($file)) {
        //     $file->out_trade_no = $out_trade_no;
        //     $file->save();
        // }
        //这段是把out_trade_no和要处理的订单关联起来
        return "http://paysdk.weixin.qq.com/example/qrcode.php?data=" . $url;

    }

    public function callback($data, &$msg){
      //echo "处理回调";
      Log::DEBUG("call back:" . json_encode($data));

      $notify = new WxpayServerPub();
    	//存储微信的回调
    	$xml = $GLOBALS['HTTP_RAW_POST_DATA'];
    	$notify->saveData($xml);

      $res =  file_get_contents("php://input");
      $disk = Storage::disk('wxpay');
      // $contents = $disk->get('file.jpg')
      // $contents = Storage::disk('wxpay')->get('wxpay.txt');
      $contents = $disk->append('wxpay.txt',$res);

      // dd($contents);
      die();



      dd(file_get_contents("php://input") );

        //echo "处理回调";
        Log::DEBUG("call back:" . json_encode($data));

        if(!array_key_exists("openid", $data) ||
          !array_key_exists("product_id", $data))
        {
          $msg = "回调数据异常";
          return false;
        }

        $openid = $data["openid"];
        $product_id = $data["product_id"];

        //统一下单
        $result = $this->unifiedorder($openid, $product_id);
        if(!array_key_exists("appid", $result) ||
           !array_key_exists("mch_id", $result) ||
           !array_key_exists("prepay_id", $result))
        {
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
