<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script>

    </script>
    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script src="{{asset('resources/views/home/js/jquery.js')}}"></script>
    <title>Document</title>
</head>
<body>
<script>
    wx.config({
        debug: false,
        appId: "{{$appid}}",
        timestamp: "{{$timestamp}}",
        nonceStr: "{{$nonceStr}}",
        signature: "{{$signature}}",
        jsApiList: [
            // 所有要调用的 API 都要加到这个列表中
            'checkJsApi',
            'openLocation',
            'getLocation'
        ]
    });

    wx.ready(function () {
        //--确认微信版本地址
        wx.checkJsApi({
            jsApiList: [
                'getLocation'
            ],
            success: function (res) {
                //alert(JSON.stringify(res));
                //alert(JSON.stringify(res.checkResult.getLocation));
                if (res.checkResult.getLocation == false) {
                    alert('你的微信版本太低，请升级到最新的微信版本！');
                    return;
                }
            }
        });
        //--确认微信版本地址

        //--调取地址
        wx.getLocation({
            success: function (res) {
                var latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
                var longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
                var speed = res.speed; // 速度，以米/每秒计
                var accuracy = res.accuracy; // 位置精度
                alert(latitude);

                //ajax 获取信息 并显示页面

                $.post("{{url('wap/self_media/get_address')}}",{'id': 12,'_token':"{{csrf_token()}}"},function(a){
                    alert(a);
                });

                alert(latitude);
            },
            cancel: function (res) {
                alert('用户拒绝授权获取地理位置');
            }
        });
        //--调取地址

    });



</script>
</body>
</html>