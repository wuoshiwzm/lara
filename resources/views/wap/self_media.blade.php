<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <title>Document</title>
</head>
<body>
<script>
    wx.config({
        debug: true,
        appId:{{$appid}},
        timestamp:{{$timestamp}},
        nonceStr: {{$nonceStr}},
        signature: {{$signature}},
        jsApiList: [
            // 所有要调用的 API 都要加到这个列表中
            'checkJsApi',
            'openLocation',
            'getLocation'
        ]
    });

    wx.ready(function () {
        //        调取地址 --
        wx.checkJsApi({
            jsApiList: [
                'getLocation'
            ],
            success: function (res) {
                 alert(JSON.stringify(res));
                // alert(JSON.stringify(res.checkResult.getLocation));
                if (res.checkResult.getLocation == false) {
                    alert('你的微信版本太低，不支持微信JS接口，请升级到最新的微信版本！');
                    return;
                }
            }
        });
        //        调取地址 --
    });

</script>
</body>
</html>