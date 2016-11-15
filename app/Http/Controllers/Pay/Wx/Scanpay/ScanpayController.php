<?php
namespace App\Http\Controllers\Pay\Wx\Scanpay;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 *GET localhost/youge/blog/public/File/getQrcode
 *
 *获取付款二维码url的参数
 *
 */
require_once app_path()."/Http/Wxpay/lib/WxPay.Api.php";
require_once app_path()."/Http/Wxpay/example/WxPay.NativePay.php";



class ScanpayController extends Controller
{
    function index(){
      $this->getQrcode();
    }

    //注意引入文件的路径
    // public function getQrcode(Request $request)
    public function getQrcode()
    {
        // $file_id = $request->input('file_id', '');
        // $out_trade_no = WxPayConfig::MCHID . date("YmdHis") . $file_id;
        $out_trade_no = \WxPayConfig::MCHID . date("YmdHis");
        //我的out_trade_no是这么做的 由于我的file_id（就是我的商家订单）是唯一的，所以无论如何这个结果都是唯一的
        $notify = new \NativePay();
        $input = new \WxPayUnifiedOrder();
        $input->SetBody("这里写这是什么服务项目的支付");
        $input->SetAttach("ljm");
        $input->SetOut_trade_no($out_trade_no);
        $input->SetTotal_fee("600");
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetGoods_tag("test");
        $input->SetNotify_url("http://127.0.0.1/youge/blog/public/index.php/payNotify");
        //这里设置支付成功后的回调接口，不能有参数。还有，这里的127.0.0.1是收不到微信后台发出的回调函数的，只能用服务器来测试了。
        $input->SetTrade_type("NATIVE");
        $input->SetProduct_id("123456789");
        $result = $notify->GetPayUrl($input);

        $url = $result["code_url"];

        $file = File::where('id', $file_id)->first();
        if (!empty($file)) {
            $file->out_trade_no = $out_trade_no;
            $file->save();
        }
        //这段是把out_trade_no和要处理的订单关联起来
        return "http://paysdk.weixin.qq.com/example/qrcode.php?data=" . $url;
    }
}
