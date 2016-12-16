<!DOCTYPE HTML>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gbk"/>
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black">


    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/splash/splash-icon.png">
    <link rel="apple-touch-startup-image" href="images/splash/splash-screen.png"
          media="screen and (max-device-width: 320px)"/>
    <link rel="apple-touch-startup-image" href="images/splash/splash-screen_402x.png"
          media="(max-device-width: 480px) and (-webkit-min-device-pixel-ratio: 2)"/>
    <link rel="apple-touch-startup-image" sizes="640x1096" href="images/splash/splash-screen_403x.png"/>
    <link rel="apple-touch-startup-image" sizes="1024x748" href="images/splash/splash-screen-ipad-landscape"
          media="screen and (min-device-width : 481px) and (max-device-width : 1024px) and (orientation : landscape)"/>
    <link rel="apple-touch-startup-image" sizes="768x1004" href="images/splash/splash-screen-ipad-portrait.png"
          media="screen and (min-device-width : 481px) and (max-device-width : 1024px) and (orientation : portrait)"/>
    <link rel="apple-touch-startup-image" sizes="1536x2008" href="images/splash/splash-screen-ipad-portrait-retina.png"
          media="(device-width: 768px)	and (orientation: portrait)	and (-webkit-device-pixel-ratio: 2)"/>
    <link rel="apple-touch-startup-image" sizes="1496x2048" href="images/splash/splash-screen-ipad-landscape-retina.png"
          media="(device-width: 768px)	and (orientation: landscape)	and (-webkit-device-pixel-ratio: 2)"/>


    <title>@yield('title')</title>

    <link href="{{asset('resources/views/wap/styles/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('resources/views/wap/styles/framework.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('resources/views/wap/styles/owl.carousel.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('resources/views/wap/styles/owl.theme.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('resources/views/wap/styles/swipebox.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('resources/views/wap/styles/colorbox.css')}}" rel="stylesheet" type="text/css">
    <title>@yield('css')</title>



    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script type="text/javascript" src="{{asset('resources/views/wap/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/views/wap/js/jqueryui.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/views/wap/js/owl.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/views/wap/js/jquery.swipebox.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/views/wap/js/colorbox.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/views/wap/js/snap.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/views/wap/js/contact.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/views/wap/js/custom.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/views/wap/js/framework.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/views/wap/js/framework.launcher.js')}}"></script>
    <title>@yield('js')</title>


</head>
<body>
 

<div class="top-deco"></div>






{{--内容部分--}}
<div class="wide-item-wrapper">

@yield('content')
    {{--循环体--}}
    {{--<div class="wide-item-titles">--}}
        {{--<h4>I do nothing!</h4>--}}
        {{--<p>You can add as many images as you want!</p>--}}
    {{--</div>--}}
    {{--<div class="wide-image">--}}
        {{--<div class="overlay"></div>--}}
        {{--<a class="tile-wide" href="#">--}}
            {{--<img class="responsive-image"--}}
                 {{--src="{{asset('resources/views/wap/images/general-nature/1w.jpg')}}"--}}
                 {{--alt="img"></a>--}}
    {{--</div>--}}

</div>




{{--分享部分--}}
{{--<div class="content">--}}
{{--<div class="decoration"></div>--}}
{{--<div class="footer">--}}
{{--<div class="socials">--}}
{{--<a href="#" class="twitter-icon"></a>--}}
{{--<a href="#" class="google-icon"></a>--}}
{{--<a href="#" class="facebook-icon"></a>--}}
{{--</div>--}}
{{--<div class="clear"></div>--}}
{{--<p class="copyright">--}}
{{--COPYRIGHT 2015.<br>--}}
{{--ALL RIGHTS RESERVED--}}
{{--</p>--}}
{{--</div>--}}

{{--</div>--}}

<div class="bottom-deco"></div>


</body>
</html>