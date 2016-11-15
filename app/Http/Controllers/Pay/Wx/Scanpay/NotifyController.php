<?php
namespace App\Http\Controllers\Pay\Wx\Scanpay;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

ini_set('date.timezone','Asia/Shanghai');
error_reporting(E_ERROR);

require_once app_path()."/Http/Wxpay/lib/WxPay.Api.php";
require_once app_path().'/Http/Wxpay/lib/WxPay.Notify.php';
require_once app_path().'/Http/Wxpay/example/log.php';

class NotifyController extends Controller
{
    public function index(){
      $postdata = file_get_contents("php://input");
      // $postObj = simplexml_load_string ( $postdata, 'SimpleXMLElement', LIBXML_NOCDATA );
      // $trade_state =$_GET ["trade_state"];//支付状态
      // $out_trade_no = $_GET ["out_trade_no"];//订单号
      //
      $disk = Storage::disk('wxpay');
      $contents = $disk->append('wxpay.txt',$postdata);


      // \Log::DEBUG("begin notify");
      // $notify = new PayNotifyCallBack();
      // $notify->Handle(false);
    }
}


class PayNotifyCallBack extends \WxPayNotify
{

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
