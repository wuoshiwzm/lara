<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>首页</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font-size: 1rem;
            font-family: "微软雅黑";
            background: #f2f4f8;
        }

        a {
            text-decoration: none;
            color: #000;
        }

        .box {
            max-width: 720px;
            min-width: 320px;
            width: 100%;
            margin: auto
        }

        /*banner*/
        .banner_box {
            width: 100%;
            text-align: center;
            margin: 0 auto;
            position: relative;
            overflow: hidden;
            z-index: 5;
            background: #F8F8F8;
            margin-top: 3.75rem;
        }

        .swiper-container {
            height: 6.5rem;
            width: 100%;
            text-align: center;
            margin: 0 auto;
            position: relative;
            overflow: hidden;
            z-index: 5;
            margin-bottom: 0.2rem;
            background: #F8F8F8;
        }

        .swiper-wrapper {
            position: relative;
            z-index: 10;
        }

        .swiper-slide {
            position: relative;
            text-align: center;
            float: left;
        }

        .swiper-slide a {
            position: relative;
            width: 100%;
            height: 100%;
            display: block;
            overflow: hidden;
        }

        .swiper-slide img {
            width: 100%;
            height: auto;
            vertical-align: middle;
            position: relative;
        }

        .pagination {
            position: absolute;
            height: 1.2rem;
            width: 100%;
            bottom: 0.875rem;
            z-index: 100;
        }

        .pagination .swiper-pagination-switch {
            display: inline-block;
            height: 0.5em;
            width: 0.5em;
            background: #FFF;
            border-radius: 50%;
            margin-right: 1em;
        }

        .pagination .swiper-active-switch {
            background: #fe5e52;
        }

        .b_header {
            position: relative;
            height: 4rem;
            line-height: 4rem;
            overflow: hidden;
        }

        .b_header a img {
            width: 8rem;
            height: 4rem;
        }

        .header_r {
            width: 100%;
            height: 4rem;
            overflow: hidden;
            position: absolute;
            top: 0;
            left: 8rem;
            background: #fff;
            text-align: center;
        }

        .twcb {
            padding-left: 0.5rem;
            padding-right: 0.5rem;
        }

        .twlb_ct {
            width: 100%;
            background: #fff;
            margin-bottom: 0.2rem;
        }

        .twlb_top {
            width: 100%;
            height: 3rem;
            line-height: 3rem;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .twlb_top i {
            display: block;
            width: 3rem;
            height: 3rem;
            overflow: hidden;
            float: left;
            margin-left: 0.5rem;
        }

        .twlb_top i img {
            width: 100%;
            height: 100%;
            border-radius: 100%;
        }

        .twlb_top p {
            float: left;
        }

        .twlb_top em {
            float: right;
            padding-right: 1rem;
            font-size: 0.622rem;
        }

        .twcb dt {
            width: 7rem;
            height: 5.2rem;
        }

        .twcb dt img {
            width: 100%;
        }

        .twlb_footer {
            position: relative;
            height: 2.275555rem;
            line-height: 2.275555rem;
        }

        .twlb_footer span {
            font-size: 0.2777rem;
            color: #999;
        }

        .twlb_footer .fxl {
            padding-left: 0.5rem;
        }

        .twlb_footer .fxb {
            position: absolute;
            right: 0.5rem;
            font-size: 0.2777rem;
            color: #999;
        }

        .footer {
            text-align: center;
        }
        .content {font-size: 1.22rem; margin-bottom: 3rem; padding: 2rem; line-height: 2.22rem; text-shadow: 0.1rem 0.1rem 0.5rem #FF0000;}
        .content img {width: 7rem; height: 7rem;}
    </style>
    <script type="text/javascript" src="{{asset('resources/views/wap/js/jquery-1.10.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/views/wap/js/swiper-2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/views/wap/js/media-query.js')}}"></script>
</head>
<body>
<div class="box">
    <div class="b_header">
        <a href="#"><img src="{{asset('resources/views/wap/images/logo.jpg')}}"/> </a>
        <div class="header_r"><p>无穷大网络信息服务平台正式上线了！...无穷大网络信息服务</p></div>
    </div>
    <div class="swiper-container">
        <div class="swiper-wrapper" id="swiper-wrapper">

            <div class="swiper-slide"><a href="#"><img src="{{asset('resources/views/wap/images/banner.jpg')}}" alt=""></a></div>
            <div class="swiper-slide"><a href="#"><img src="{{asset('resources/views/wap/images/banner.jpg')}}" alt=""></a></div>
            <div class="swiper-slide"><a href="#"><img src="{{asset('resources/views/wap/images/banner.jpg')}}" alt=""></a></div>
        </div>
        <div class="pagination"></div>
    </div>

    {{--菜单--}}

    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
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
                    //alert(JSON.stringify(res));
                    //alert(JSON.stringify(res.checkResult.getLocation));
                    if (res.checkResult.getLocation == false) {
                        alert('你的微信版本太低，请升级到最新的微信版本！');
//                        location.href = "/wap/self_media";
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

                    $.post("{{url('wap/self_media/get_content')}}",
                            {
                                'latitude': latitude,
                                'longitude': longitude,
                                'accuracy': accuracy,
                                '_token': "{{csrf_token()}}",
                                'openId': "{{$openId}}",

                            }, function (data) {
                                //得到内容的JSON 字符串，解析并显示

                                //解析 json字符串
                                var data = $.parseJSON(data);
                                if(data)
                                {
                                    $.each(data, function (n, value) {

    //                                    alert(value['content']);
                                        //clear the select options then add the new info
                                        $("#article_contents").append(
                                                "<a href ='/wap/self_media/"+ value['media_id'] + "'>"
                                                +"<div class='twlb_ct'>"
                                                + "<div class='twlb_top'>"
                                                + "<i><img src='/resources/views/wap/images/touxiang.jpg'/></i>"
                                                + "<p>"+value['user_name']+"</p>"
                                                + "<em>发送时间" + value['created_at'] + "</em>"
                                                + "</div>"
                                                + "<div class='twcb'>"
                                                + "<h4><a href='/wap/self_media/" + value['media_id'] + "'>"
                                                + value['title'].substr(0, 12)
                                                + "...</a></h4>"
                                                + "</div>"
                                                + "<div class='twlb_footer'>"
                                                + "<span class='fxl'>分享数量" + value['share_time'] + "</span>"
                                                + "<a href='/wap/self_media/" + value['media_id'] + "'  class='fxb'> 分享</a>"
                                                + "</div> </div>"
                                                +"</a>"
                                        );
                                    });
                                }
                                else
                                {
                                    $("#article_contents").append(
                                        '<div class="content">'
                                        +'    <p>糟糕，你来迟了分享推广已经分享完啦！更多分享推广正在编写中，请稍后再来哦”</p>'
                                        +'</div>'
                                    );
                                }

                            });
                },
                cancel: function (res) {
                    alert('用户拒绝授权获取地理位置');
                    location.href = "/wap/self_media";
                }
            });
            //--调取地址 end

        });


    </script>
    <input type="button" value="get" onclick="location.href='http://www.adbangbang.com/wap/self_media/get_content?latitude=34.247851752062&longitude=108.90309333801&openId=123123'" />
    <div id="article_contents">


    </div>


    <div class="footer">
        <div>
            <p>©2015-2016版权所有</p>
        </div>
        <div>
            <img src="{{asset('resources/views/wap/images/ewm.jpg')}}"/>
        </div>
    </div>
</body>

</html>
