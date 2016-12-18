@extends('layouts.wap.index')
@section('content')

    {{--地址判断--}}



    {{--分享接口--}}

    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script>

        wx.config({
            debug: false,
            appId: 'wx260619ea73a4b130',     // 必填，公众号的唯一标识
            timestamp: {{$timestamp}}, // 必填，生成签名的时间戳
            nonceStr: "{{$nonceStr}}", // 必填，生成签名的随机串
            signature: "{{$signature}}",// 必填，签名，见附录1
            jsApiList: ['onMenuShareTimeline'],
            openId:1
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
                        location.href = "/wap/self_media";
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


                    //ajax 获取信息 并显示页面

                    $.post("{{url('wap/self_media/check_location')}}",
                            {
                                'latitude': latitude,
                                'longitude': longitude,
                                'accuracy': accuracy,
                                '_token': "{{csrf_token()}}",
                                'media_id':"{{$media_id}}",
                            }, function (data) {
                                //得到内容的JSON 字符串，解析并显示

                                //解析 json字符串


                                //判断是否可以分享此内容 如果不行则返回到主页 如果可以就继续执行
                                if(!data){
                                    alert('您的区域无法分享该内容');
                                    location.href = "/wap/self_media";
                                }
                                //alert(data);
                            });

                },
                cancel: function (res) {
                    alert('用户拒绝授权获取地理位置');
                    location.href = "/wap/self_media";
                }
            });
            //--调取地址 end


            //----分享定制
            var shareData = {
                title: '这个秘密我只告诉你哦！'+"{{$content->title}}",
                desc: '无穷大分享 分享抢红包 分享有惊喜！',
                link: 'http://adbangbang.com/wap/self_media/' + "{{$media_id}}",
                imgUrl: "{{asset('resources/views/home/images/logo.jpg')}}",
                success: function () {
                    // 用户确认分享后执行的回调函数
                    // 将此文章id 和 OPENID 存入数据库
                    window.open("https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx260619ea73a4b130&redirect_uri=http://adbangbang.com/sharesuccess/" + "{{$media_id}}" + "&response_type=code&scope=snsapi_base&state=123#wechat_redirect");
                },
                cancel: function () {
                    alert('cancel');
                    // 用户取消分享后执行的回调函数
                }
            };

            wx.onMenuShareAppMessage(shareData);
            wx.onMenuShareTimeline(shareData);
            // ----分享定制


        });

        wx.error(function (res) {
            alert(res.errMsg);
        });
    </script>




    {{--菜单--}}
    <div class="content">
        <div class="header">
            <a href="#" class="homepage-logo">
                <img src="{{asset('resources/views/wap/images/misc/logo.png')}}" alt="img">
            </a>

        </div>
        <div class="decoration"></div>


    </div>


    <div class="content">

        <div class="container no-bottom" style="text-align: right">
            <h2>无穷大分享平台 ！</h2>
            <p>
                --分享你的精彩 点击右上角分享到朋友圈有惊喜哦！
            </p>
        </div>

        <div class="decoration"></div>


        <div class="decoration"></div>

        <div class="one-half-responsive">
            <h4>快来分享 赢红包吧！！！</h4>
            <div style="text-align: center" id="media_content">

                <p>{!! $content->content !!}</p>

            </div>
        </div>
        <div class="decoration hide-if-responsive"></div>
        <div class="one-half-responsive last-column">

        </div>


        <div class="decoration"></div>


    </div>

@stop