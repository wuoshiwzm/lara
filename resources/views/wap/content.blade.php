<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>信息详细介绍页</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
		<link rel="stylesheet" href="{{asset('resources/views/wap/css/amazeui.min.css')}}" />
		<link rel="stylesheet" href="{{asset('resources/views/wap/css/style.css')}}" />
        <script type="text/javascript" src="{{asset('resources/views/wap/js/jquery-1.10.2.min.js')}}" ></script>
        <script type="text/javascript" src="{{asset('resources/views/wap/js/swiper-2.1.min.js')}}" ></script>
        <script type="text/javascript" src="{{asset('resources/views/wap/js/media-query.js')}}" ></script>
	<script type="text/javascript" src="{{asset('resources/views/wap/js/amazeui.js')}}" ></script>
    </head>
    <body>
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
                                //判断是否可以分享此内容 如果不行则返回到主页 如果可以就继续执行
                                if(data == 'false'){
                                    alert('您的区域无法分享该内容');
                                    location.href = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx260619ea73a4b130&redirect_uri=http://adbangbang.com/wap/self_media1&response_type=code&scope=snsapi_base&state=123#wechat_redirect";
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
                    alert('取消分享');
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
        @if($content->contenttype == '1')
        <iframe src="{{urldecode($content->cjurl)}}" style="width:100%;height:100%;border:none;"></iframe>
        @else
		<div class="big_content">
        <div class="box">
            <div class="b_header">
                <a href="#"><img src="{{asset('resources/views/wap/images/logo.jpg')}}"/> </a>
                <div class="header_r"><p>无穷大网络信息服务平台正式上线了！...无穷大网络信息服务</p></div>
            </div>  
            <div class="swiper-container">
                    <div class="swiper-wrapper" id="swiper-wrapper">
                        <div class="swiper-slide"><a href="#"><img src="{{asset('resources/views/wap/images/qmts.jpg')}}" alt=""></a></div>
                        <div class="swiper-slide"><a href="#"><img src="{{asset('resources/views/wap/images/qmts.jpg')}}" alt=""></a></div>
                        <div class="swiper-slide"><a href="#"><img src="{{asset('resources/views/wap/images/qmts.jpg')}}" alt=""></a></div>
                    </div>
                    <div class="pagination"></div>
            </div>

            <div class="content">
                <div class="c_title"> <p>发布时间 {{$content->created_at}}</p>  </div>
				<div  data-am-widget="gallery" class="am-gallery am-avg-sm-2
  am-avg-md-3 am-avg-lg-4 am-gallery-overlay" data-am-gallery="{ pureview: true }" >
                @if($content)
                <p>{!! $content->content !!}</p>
                @endif
				</div>
            </div>

            <div class="footer">
                <div>
                    <p class="copy">©2015-2017无穷大网络信息服务平台版权所有</p>           
                </div>
                <div class="ewm">
                    <img src="{{asset('resources/views/wap/images/ewm.jpg')}}" />
                </div>
                <div class="more">
                    <p>关注微信公众号 查看更多分享推广哦</p>
                </div>
            </div>
        </div>
		</div>	
        @endif
		
    </body>
</html>