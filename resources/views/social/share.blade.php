
<!DOCTYPE html>
<html>
<head>


  <meta charset="utf-8">
  <title>微信JS-SDK Demo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">

  <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
      <script>
      	wx.config({
      		debug: true,
          appId: 'wx260619ea73a4b130',     // 必填，公众号的唯一标识
          timestamp: {{$wechat['timestamp']}}, // 必填，生成签名的时间戳
          nonceStr:  "{{$wechat['noncestr']}}", // 必填，生成签名的随机串
          signature: "{{$wechat['signature']}}",// 必填，签名，见附录1
          jsApiList: ['onMenuShareTimeline']
      	});

      	wx.ready(function () {
      		var shareData = {
      			title: '这里是分享标题',
      			desc: '这里是发送给好友的时候的简介',
      			link: 'http://baidu.com',
      			imgUrl: 'http://baidu.com/logo.jpg'
      		};
      		wx.onMenuShareAppMessage(shareData);

      	});

      	wx.error(function (res) {
      	  alert(res.errMsg);
      	});
  </script>

</head>
<body ontouchstart="">
这个页面是demo页面。
认证服务号已测试成功。
记得现在后台设置已备案的安全域名。
</body>



</html>
