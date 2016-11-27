<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>首页</title>
<link rel="stylesheet" media="screen" href="{{asset('resources/views/home/css/style.css')}}" />
<link rel="stylesheet" media="screen" href="{{asset('resources/views/home/css/jquery.jslides.css')}}" />


<script type="text/javascript" src="{{asset('resources/views/home/js/jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/views/home/js/jquery.jslides.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/views/home/js/link.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/views/home/js/script.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/org/layer/layer.js')}}"></script>
</head>

<body>

<?php
  //dd(session('user'));
?>
  <body onload="time()">
  <!-- data for weixin share -->


 <input type="hidden"  class="session_user"  value=
 @if( session('user'))
 "{{session('user')->user_name}}"
 @else
 ""
 @endif >
  <div class="top">
  <div class="wrappersy">
      <div class="logo">
      <a href=" {{url('')}}"><img src="{{asset('resources/views/home/images/logo.jpg')}}"></a>
      </div>
      <div class="top_right">


<!-- weather date ... -->
@include('layouts.rig_top')

<!-- nav bar -->
@include('layouts.nav')

<!-- seach bar -->
@include('layouts.search')
</div>
</div>
</div>
<!-- 主横幅 -->
@include('layouts.widget.mpic')

<!-- 入驻信息 -->
@include('layouts.widget.join')


<!-- 小横幅 -->
@include('layouts.widget.spic')

<!-- 登陆 -->
@include('layouts.widget.ajax_login')

<!-- 主流媒体 -->
@include('layouts.widget.main_media')

<!-- 精品推荐 - 广告分类 -->
@include('layouts.widget.recm')

<!-- 广告位 - 自媒体 -->
<div class="guanggaowei">
     <a href="{{url('self_media')}}"><img src="{{asset('resources/views/home/images/guanggao.jpg')}}" alt="" /></a>
</div>

<!-- 精品推荐 - 设计分类 -->
@include('layouts.widget.recm1')



<!-- 公司展示 -->
<div class="gszs">
    <div class="img_pa">
        <img src="images/aca.jpg" alt="" />
        <img src="images/aca.jpg" alt="" />
        <img src="images/aca.jpg" alt="" />
        <img src="images/aca.jpg" alt="" />
        <img src="images/aca.jpg" alt="" />
        <img src="images/aca.jpg" alt="" />
        <img src="images/aca.jpg" alt="" />
        <img src="images/aca.jpg" alt="" />
        <img src="images/aca.jpg" alt="" />
        <img src="images/aca.jpg" alt="" />
        <img src="images/aca.jpg" alt="" />
        <img src="images/aca.jpg" alt="" />
        <img src="images/aca.jpg" alt="" />
        <img src="images/aca.jpg" alt="" />
    </div>
    <div class="clear"></div>
    <div class="more_box3">
    	<a href=""><p>MORE</p></a>
    </div>
</div>


<!-- 招商招标 -->
@include('layouts.widget.investment')


<?php die(); ?>
<div class="bot">
    <li>
        <span class="fli">张三</span>
        <span>13.20</span>
        <span>浏览了</span>
        <span><a href="">西安步旗文化广告传播公司</a></span>
        <span>求购公司</span>
    </li>
     <li>
        <span class="fli">张三</span>
        <span>13.20</span>
        <span>浏览了</span>
        <span><a href="">西安步旗文化广告传播公司</a></span>
        <span>求购公司</span>
    </li>
     <li>
        <span class="fli">张三</span>
        <span>13.20</span>
        <span>浏览了</span>
        <span><a href="">西安步旗文化广告传播公司</a></span>
        <span>求购公司</span>
    </li>
</div>
<div class="yl">
    <div class="yl_con">
        <a href="">西安步旗文化广告传播公司</a>
        <a href="">西安步旗文化广告传播公司</a>
        <a href="">西安步旗文化广告传播公司</a>
        <a href="">西安步旗文化广告传播公司</a>
    </div>
</div>
<div class="footer">
    <div class="fot_main">
        <img src="images/footlogo.jpg" class="fotlogo" />
        <div class="mian_com">
            <div class="fot_box">
                <div class="top_fot">
                    <a href="">广告媒体</a>
                </div>
                <ul>
                    <li><a href="">电视广告</a></li>
                    <li><a href="">电视广告</a></li>
                    <li><a href="">电视广告</a></li>
                    <li><a href="">电视广告</a></li>
                    <li><a href="">电视广告</a></li>
                    <li><a href="">电视广告</a></li>

                </ul>
            </div>
            <div class="fot_box">
                <div class="top_fot">
                    <a href="">广告媒体</a>
                </div>
                <ul>
                    <li><a href="">电视广告</a></li>
                    <li><a href="">电视广告</a></li>
                    <li><a href="">电视广告</a></li>
                    <li><a href="">电视广告</a></li>
                    <li><a href="">电视广告</a></li>
                    <li><a href="">电视广告</a></li>

                </ul>
            </div>
            <div class="fot_box">
                <div class="top_fot">
                    <a href="">广告媒体</a>
                </div>
                <ul>
                    <li><a href="">电视广告</a></li>
                    <li><a href="">电视广告</a></li>
                    <li><a href="">电视广告</a></li>
                    <li><a href="">电视广告</a></li>
                    <li><a href="">电视广告</a></li>
                    <li><a href="">电视广告</a></li>

                </ul>
            </div>
            <div class="fot_box">
                <div class="top_fot">
                    <a href="">广告媒体</a>
                </div>
                <ul>
                    <li><a href="">电视广告</a></li>
                    <li><a href="">电视广告</a></li>
                    <li><a href="">电视广告</a></li>
                    <li><a href="">电视广告</a></li>
                    <li><a href="">电视广告</a></li>
                    <li><a href="">电视广告</a></li>

                </ul>
            </div>
            <div class="clear"></div>
            <div class="fot_bot ">
                <p class="left">版权所有：西安步旗广告文化传播有限公司</p>
                <p class="right"> 网站总浏览量：1234  今日浏览量：230  当前在线人数：20人</p>
            </div>
        </div>
        <div class="rig_fot">
            <img src="images/weixin.jpg" alt="" />
            <p>微信扫一扫</p>
        </div>
    </div>
</div>
<div class="duilian duilian_right" style="display: block; top: 300px;">
    <div class="duilian_con">
        <a href="" id="sina" target="_blank"></a>
        <a href="" id="tengxun" target="_blank"></a>
        <a href="" id="tengxun" target="_blank"></a>
     </div>
</div>

</body>
</html>
