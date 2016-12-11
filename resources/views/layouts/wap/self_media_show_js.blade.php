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
        //--确认微信版本地址 end

        //--调取地址
        wx.getLocation({
            success: function (res) {
                var latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
                var longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
                var speed = res.speed; // 速度，以米/每秒计
                var accuracy = res.accuracy; // 位置精度

                alert('latitude:'+latitude+'longitude:'+longitude);
                //ajax 获取信息 并显示页面

                $.post("{{url('wap/self_media/get_content')}}",
                        {
                            'latitude': latitude,
                            'longitude': longitude,
                            'accuracy': accuracy,
                            '_token': "{{csrf_token()}}",


                        }, function (data) {
                            //得到内容的JSON 字符串，解析并显示

                            //解析 json字符串
                            var data = $.parseJSON(data);

                            alert(data);
                        });

            },
            cancel: function (res) {
                alert('用户拒绝授权获取地理位置');
            }
        });
        //--调取地址 end

    });


</script>