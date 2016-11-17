<?php
namespace App\Http\Controllers\Pay\Wx\Scanpay;
use Illuminate\Foundation\Http\Kernel;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Model\Payment;

ini_set('date.timezone','Asia/Shanghai');
error_reporting(E_ERROR);

require_once app_path()."/Http/Wxpay/lib/WxPay.Api.php";
require_once app_path().'/Http/Wxpay/lib/WxPay.Notify.php';
require_once app_path().'/Http/Wxpay/example/log.php';



class NotifyController extends Controller
{

    /*

    <xml><appid><![CDATA[wx260619ea73a4b130]]></appid>
    <attach><![CDATA[L]]></attach>
    <bank_type><![CDATA[CMB_DEBIT]]></bank_type>
    <cash_fee><![CDATA[1]]></cash_fee>
    <fee_type><![CDATA[CNY]]></fee_type>
    <is_subscribe><![CDATA[Y]]></is_subscribe>
    <mch_id><![CDATA[1396303202]]></mch_id>
    <nonce_str><![CDATA[luokm3pp2co2dlt2v9nt10sstmj3pula]]></nonce_str>
    <openid><![CDATA[oe72EwqRljlpSX3I9tNK2aIwzSWc]]></openid>
    <out_trade_no><![CDATA[139630320220161116205302]]></out_trade_no>
    <result_code><![CDATA[SUCCESS]]></result_code>
    <return_code><![CDATA[SUCCESS]]></return_code>
    <sign><![CDATA[D016584E3C6B550982AF2B4BFB581EBF]]></sign>
    <time_end><![CDATA[20161116205319]]></time_end>
    <total_fee>1</total_fee>
    <trade_type><![CDATA[NATIVE]]></trade_type>
    <transaction_id><![CDATA[4001912001201611169939140993]]></transaction_id>
    </xml>

    */

    public function index(){

      $postStr = file_get_contents("php://input");
      $disk = Storage::disk('wxpay');
      // $contents = $disk->append('wxpay.txt',$postStr);


      $payment = array();
      $msg = array();
      $msg = (array)simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);


      $payment['payment_user_name'] = $msg['attach'];
      $payment['payment_out_trade_no'] = $msg['out_trade_no'];
      $payment['payment_cash_fee'] = $msg['cash_fee'];
      $payment['payment_total_fee'] = $msg['total_fee'];
      $payment['payment_openid'] = $msg['openid'];

      //if the payment_out_trade_no already existed
      $num = Payment::wherer('payment_out_trade_no',$payment['payment_out_trade_no'])->count();

      $disk->append('wxpay.txt',$num);
      //if $num == 0 , means there is no such order. them write to databaese
      if(!$num){
        Payment::create($payment);
      }
    }
}


class PayNotifyCallBack extends \WxPayNotify
{


  public static function notifyReceive(){
    //初始化日志
    $logHandler= new \CLogFileHandler(storage_path()."/app/wxpay/".date('Y-m-d').'.log');
    $log = \Log::Init($logHandler, 15);

    \Log::DEBUG("begin notify");
    $notify = new PayNotifyCallBack();
    $notify->Handle(false);
  }
	//查询订单
	public function Queryorder($transaction_id)
	{
		$input = new WxPayOrderQuery();
		$input->SetTransaction_id($transaction_id);
		$result = WxPayApi::orderQuery($input);
		\Log::DEBUG("query:" . json_encode($result));
		if(array_key_exists("return_code", $result)
			&& array_key_exists("result_code", $result)
			&& $result["return_code"] == "SUCCESS"
			&& $result["result_code"] == "SUCCESS")
		{
			return true;
		}
		return false;
	}

	//重写回调处理函数
	public function NotifyProcess($data, &$msg)
	{
		\Log::DEBUG("call back:" . json_encode($data));
		$notfiyOutput = array();

		if(!array_key_exists("transaction_id", $data)){
			$msg = "输入参数不正确";
			return false;
		}
		//查询订单，判断订单真实性
		if(!$this->Queryorder($data["transaction_id"])){
			$msg = "订单查询失败";
			return false;
		}
		return true;
	}
}
