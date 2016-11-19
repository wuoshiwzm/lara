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
</body>

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

        wx.onMenuShareTimeline({
            title: '这里是分享标题',
            link: 'http://adbangbang.com/sharecontent/'+{{$media_id}},
            imgUrl: "{{asset('resources/views/home/images/logo.jpg')}}"
            success: function () {
                alert('shareit!');
            },
            cancel: function () {
                alert('cancel shareing!');
            }
        });

    	});

    	wx.error(function (res) {
    	  alert(res.errMsg);
    	});
</script>

</html>
