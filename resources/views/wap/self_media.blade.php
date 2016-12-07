<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script>

    </script>
    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <title>Document</title>
</head>
<body>
<script>
    wx.config({
        debug: true,
        appId:"{{$appid}}",
        timestamp:"{{$timestamp}}",
        nonceStr:"{{$nonceStr}}" ,
        signature:"{{$signature}}",
        jsApiList: [
            // 所有要调用的 API 都要加到这个列表中
            'checkJsApi',
            'openLocation',
            'getLocation'
        ]
    });

    wx.ready(function () {
        alert('test');
        //调取地址
//        wx.checkJsApi({
//            jsApiList: [
//                'getLocation'
//            ],
//            success: function (res) {
//                //alert(JSON.stringify(res));
//                // alert(JSON.stringify(res.checkResult.getLocation));
//                if (res.checkResult.getLocation == false) {
//                    alert('你的微信版本太低，不支持微信JS接口，请升级到最新的微信版本！');
//                    return;
//                }
//            }
//        });
        //调取地址

        //--调取地址
        wx.getLocation({
            success: function (res) {
                var latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
                var longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
                var speed = res.speed; // 速度，以米/每秒计
                var accuracy = res.accuracy; // 位置精度
                alert(accuracy+'accuracy'+longitude+'longitude');
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