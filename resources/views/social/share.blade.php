<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>分享无穷大！</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
  <link rel="stylesheet" href="{{url('resources/views/social/style.css')}}">
</head>
<body ontouchstart="">
{!!$content!!}
<script type="text/javascript">


</script>

</body>

<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script>
    	wx.config({
    		debug: true,
        appId: 'wx260619ea73a4b130',     // 必填，公众号的唯一标识
        timestamp: {{$wechat['timestamp']}}, // 必填，生成签名的时间戳
        nonceStr:  {{$wechat['noncestr']}}, // 必填，生成签名的随机串
        signature: {{$wechat['signature']}},// 必填，签名，见附录1
        jsApiList: ['onMenuShareTimeline']
    	});

    	wx.ready(function () {
    		var shareData = {
    			title: '这个秘密我只告诉你哦！',
    			desc: '无穷大分享 分享抢红包 分享有惊喜！',
    			link: 'http://adbangbang.com/sharecontent/',
    			imgUrl: "{{asset('resources/views/home/images/logo.jpg')}}",
          success: function () {
              // 用户确认分享后执行的回调函数
              // 将此文章id 和 OPENID 存入数据库
              window.open("https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx260619ea73a4b130&redirect_uri=http://adbangbang.com/sharesuccess/"+{{$media_id}}+"&response_type=code&scope=snsapi_base&state=123#wechat_redirect");
          },
          cancel: function () {
            alert('cancel');
              // 用户取消分享后执行的回调函数
          }
    		};

    		wx.onMenuShareAppMessage(shareData);
    		wx.onMenuShareTimeline(shareData);
    	});

    	wx.error(function (res) {
    	  alert(res.errMsg);
    	});
</script>

</html>
