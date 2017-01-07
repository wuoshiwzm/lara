<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>首页</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <style>
            *{margin: 0; padding: 0;}
            ul li {list-style: none;}
            body {font-size: 1rem; font-family: "微软雅黑"; background:#f2f4f8;}
            a {text-decoration: none; color: #000;}
            .box{max-width: 720px ; min-width: 320px; width: 100%; margin: auto}
            /*头部区域*/
            .b_header {position: relative; height: 4rem; line-height: 4rem; overflow: hidden;}
            .b_header a img {width: 8rem; height: 4rem;}
            .header_r {width: 100%; height: 4rem; overflow: hidden;  position: absolute;  top: 0;  left: 8rem; background: #fff;  text-align: center;}
            /*banner*/
            .banner_box{width:100%;text-align:center;margin:0 auto;position:relative;overflow:hidden;z-index:5;background:#F8F8F8; margin-top:3.75rem;}
            .swiper-container {height:6.5rem;width:100%;text-align:center;margin:0 auto;position:relative;overflow:hidden;z-index:5;margin-bottom: 0.2rem; background:#F8F8F8; }
            .swiper-wrapper {position: relative;z-index:10;}
            .swiper-slide {position:relative;text-align:center;float:left;}
            .swiper-slide a{position:relative;width:100%;height:100%;display:block;overflow:hidden;}
            .swiper-slide img{width:100%;height:6.5rem;vertical-align:middle;position:relative;}
            .pagination{position:absolute;height:1.2rem;width:100%;bottom:0.875rem;z-index:100;}
            .pagination .swiper-pagination-switch{display:inline-block;height:0.5em;width:0.5em;background:#FFF;border-radius:50%;margin-right:1em;}
            .pagination .swiper-active-switch{background:#fe5e52;}
            /*内容部分  */
            .content {position: relative; }
            .list li {margin-top: 0.2222rem; padding: 0 0.7rem; background: #fff;}
            .list_t {height: 3rem; line-height: 3rem; padding: 0.6rem 0;}
            .content .list .list_t i img {width: 3rem; height: 3rem;  border-radius: 100%;}
            .list_t .list_name {position: absolute; margin-left: 1rem;}
            .list_t .fxl {position: absolute; right: 0.5rem; font-size: 0.8rem;}
            .list_f {height: 3rem; line-height: 3rem;}
            .list_f span {font-size: 0.7rem; color: #9f9f9f;}
            .list_f .fx {position: absolute; right: 0.95rem; color: #4a90e3;}
            .list_c .list_txt {max-height: 4rem; overflow: hidden;}
            .list_c .list_img img{width: 7rem; height: 5.2rem;}
            /*底部信息*/
            .footer {text-align: center;}
            .ewm img {width: 8rem; height: 8rem;}
            .content_p {font-size: 1.22rem; margin-bottom: 3rem; padding: 2rem; line-height: 2.22rem; text-shadow: 0.1rem 0.1rem 0.5rem #FF0000;}
            .content_p img {width: 7rem; height: 7rem;}
        </style>
        <script type="text/javascript" src="{{asset('resources/views/wap/js/jquery-1.10.2.min.js')}}" ></script>
        <script type="text/javascript" src="{{asset('resources/views/wap/js/swiper-2.1.min.js')}}" ></script>
        <script type="text/javascript" src="{{asset('resources/views/wap/js/media-query.js')}}" ></script>
        <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    </head>
    <body>
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
                <ul class="list" id="article_contents">
                </ul>
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

        <script>
            wx.config({
                debug: false,
                appId: 'wx260619ea73a4b130',
                timestamp: {{$timestamp}},
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
                        var wxlocationlat = res.latitude; // 纬度，浮点数，范围为90 ~ -90
                        var wxlocationlng = res.longitude; // 经度，浮点数，范围为180 ~ -180。
                        // var speed = res.speed; // 速度，以米/每秒计
                        // var accuracy = res.accuracy; // 位置精度
                        getShareList(wxlocationlat, wxlocationlng);
                    },
                    cancel: function (res) {
                        alert('用户拒绝授权获取地理位置');
                        location.href = "/wap/self_media";
                    }
                });
                //--调取地址 end
            });
        </script>
        <script>
            function getShareList(lat, lng)
            {
                $.ajax({
                    type:'post',
                    url:'{{url('wap/self_media/get_content')}}',
                    dataType:'JSON',
                    data:'latitude='+lat+'&longitude='+lng+'&_token={{csrf_token()}}&openId={{$openId}}',
                    success: function(data){
                        if(data.length > 0)
                        {
                            for(var value in data)
                            {
                                $("#article_contents").append('<li>'
                                    +'  <a href="/wap/self_media/'+ data[value].media_id + '">'
                                    +'  <div class="list_t">'
                                    +'      <i><img src="/resources/views/wap/images/touxiang.jpg"/></i>'
                                    +'      <span class="list_name">'+data[value].user_name+'</span>'
                                    +'      <span class="fxl">分享数量 ' + data[value].share_time + '</span>'
                                    +'  </div>'
                                    +'  <div class="list_c">'
                                    +'      <div class="list_txt">'
                                    +'          <p>'+data[value].title+'</p>'
                                    +'      </div>'
                                    +'  </div>'
                                    +'  <div class="list_f">'
                                    +'      <span>发送时间' + data[value].created_at + '</span>'
                                    +'      <a class="fx" href="/wap/self_media/'+ data[value].media_id + '" >分享</a>'
                                    +'  </div>'
                                    +'  </a>'
                                    +'</li>');
                            }
                        }
                        else
                        {
                            $("#article_contents").append(
                                '<div class="content_p">'
                                +'    <p>糟糕，你来迟了分享推广已经分享完啦！更多分享推广正在编写中，请稍后再来哦”</p>'
                                +'</div>'
                            );
                        }
                    }
                });
            }
        </script>
    </body>
</html>
