<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>首页</title>
<link rel="stylesheet" media="screen" href="{{asset('resources/views/home/css/style.css')}}" />
<link rel="stylesheet" media="screen" href="{{asset('resources/views/home/css/jquery.jslides.css')}}" />

<script type="text/javascript" src="{{asset('resources/views/home/js/jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/views/home/js/jquery.jslides.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/views/home/js/link.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/views/home/js/script.js')}}"></script>
</head>

<body>


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
        <div class="box1_right">
            <div class="TabTitle">
                <ul>
                    <li class="hover" id="gsjj1" onMouseover="setTab('gsjj',1,2)"><a href="#">个人登录</a></li>
                    <!-- <li class="" id="gsjj2" onMouseover="setTab('gsjj',2,2)"><a href="#">企业登录</a></li> -->
                </ul>
                <div class="clear"></div>
            </div>
            <div class="Tabbottom">
                <div id="con_gsjj_1" class="display" style="display: block;">
                    <!--<p class="we_name">
                        欢迎回来,<a href="">李航 </a>！<span class="tuichu">[退出]</span>
                    </p>
                    <p class="we_name awe">
                    <span class="toudi">投递反馈(0)<br>消息中心(3/5)</span>
                    <span>信息管理<br>信息管理<br>信息管理</span>
                    </p>
                    <input type="button" class="denglu" value="进入个人中心"> -->
                    <input type="text" class="input_aa" value="邮箱">
                    <input type="text" class="input_aa" value="密码">
                    <p class="pp"><input type="button" class="dan"> <span> 下次自动登录</span>
                    <a href="">忘记密码?</a></p>
                    <input type="button" class="denglu" value="确认登录">
                     <p class="zhu">还没有个人账号？ <a href="">立即注册</a></p>
                    <p class="p_img">
                        <a href=""><img src="images/qq.jpg"/></a>
                        <a href=""><img src="images/weixin11.jpg"/></a>
                        <a href=""><img src="images/weibo.jpg"/></a>
                    </p>
                     </div>
                     <div id="con_gsjj_2" class="hidden" style="display: none;">
                           <input type="text" class="input_aa" value="邮箱">
                           <input type="text" class="input_aa" value="密码">
                           <p class="pp"><input type="button" class="dan"> <span> 下次自动登录</span>
                           <a href="">忘记密码?</a></p>
                           <input type="button" class="denglu" value="确认登录">
                           <p class="zhu">还没有企业账号？ <a href="">立即注册</a></p>
                     </div>
                </div>
            </div>
        </div>
</div>
<div class="box_2">
        <div class="title_box_2"></div>
        <div class="piczs">
            <div class="rollBoxa">
                <div class="Cont">
                    <div class="ScrCont">
                            <div>
                                    <ul>
                                        <li>
                                           <a href="#"><img src="images/m8.png"></a>
                                             <p class="topaa">电视广告</p>
                                             <p class="topbb">DIANSHIGUANGGAO</p>
                                        </li>
                                         <li>
                                           <a href="#"><img src="images/m8.png"></a>
                                             <p class="topaa">广播广告</p>
                                             <p class="topbb">DIANSHIGUANGGAO</p>
                                        </li>
                                         <li>
                                           <a href="#"><img src="images/m8.png"></a>
                                             <p class="topaa">电视广告</p>
                                             <p class="topbb">DIANSHIGUANGGAO</p>
                                        </li>
                                         <li>
                                           <a href="#"><img src="images/m8.png"></a>
                                             <p class="topaa">广播广告</p>
                                             <p class="topbb">DIANSHIGUANGGAO</p>
                                        </li>
                                         <li>
                                           <a href="#"><img src="images/m8.png"></a>
                                             <p class="topaa">电视广告</p>
                                             <p class="topbb">DIANSHIGUANGGAO</p>
                                        </li>
                                         <li>
                                           <a href="#"><img src="images/m8.png"></a>
                                             <p class="topaa">广播广告</p>
                                             <p class="topbb">DIANSHIGUANGGAO</p>
                                        </li>
                                    </ul>
                            </div>
                                <div class="clear"></div>
                         </div>
                     <div class="clear"></div>
            </div>
      </div>
      <div class="clear"></div>
</div>
</div>
<div class="box3">
    <div class="box3_title">
        <div class="title_left"><a href="">精品推荐<span>/</span></a><span class="small">JINGPINTUIJIAN</span></div>
        <div class="title_right">
             <ul>
                  <li class="hover" id="tuijian1" onMouseover="setTab('tuijian',1,4)"><a href="#">打折优惠</a></li>
                   <li class="" id="tuijian2" onMouseover="setTab('tuijian',2,4)"><a href="#">空挡出售</a></li>
                   <li class="" id="tuijian3" onMouseover="setTab('tuijian',3,4)"><a href="#">节点推荐</a></li>
                   <li class="" id="tuijian4" onMouseover="setTab('tuijian',4,4)"><a href="#">新媒体</a></li>
                   <a href=""><img src="images/more.jpg" alt="" /></a>
            </ul>
        </div>
    </div>
    <div class="box3_cone">
        <div id="con_tuijian_1" class="display" style="display: block;">
                <div class="rollBox mt20">
                        <div class="LeftBotton" onmousedown="ISL_GoUp()" onmouseup="ISL_StopUp()" onmouseout="ISL_StopUp()"></div>
                        <div class="RightBotton" onmousedown="ISL_GoDown()" onmouseup="ISL_StopDown()" onmouseout="ISL_StopDown()"></div>
                        <div class="Cont" id="ISL_Cont">
                            <div class="ScrCont">
                                <div id="List1">
                                    <ul>
                                        <li>
                                            <a href="#"><img src="images/img1.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体111</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#"><img src="images/img2.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#"><img src="images/img1.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#"><img src="images/img2.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#"><img src="images/img1.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div id="List2"></div>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                         <script type="text/javascript" src="js/honor.js"></script>
                        <div class="clear"></div>
                </div>
        </div>
        <div id="con_tuijian_2" class="hidden" style="display: none;">
             <div class="rollBox mt20">
                        <div class="Cont" id="ISL_Conta">
                            <div class="ScrCont">
                                <div id="List1a">
                                    <ul>
                                        <li>
                                            <a href="#"><img src="images/img1.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体222</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#"><img src="images/img2.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#"><img src="images/img1.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#"><img src="images/img2.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#"><img src="images/img1.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div id="List2a"></div>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                         <script type="text/javascript" src="js/honor.js"></script>
                        <div class="clear"></div>
                </div>
        </div>
        <div id="con_tuijian_3" class="hidden" style="display: none;">
              <div class="rollBox mt20">
                        <div class="Cont" id="ISL_Cont">
                            <div class="ScrCont">
                                <div id="List1">
                                    <ul>
                                        <li>
                                            <a href="#"><img src="images/img1.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体333</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#"><img src="images/img2.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#"><img src="images/img1.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#"><img src="images/img2.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#"><img src="images/img1.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div id="List2"></div>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                         <script type="text/javascript" src="js/honor.js"></script>
                        <div class="clear"></div>
                </div>
        </div>
        <div id="con_tuijian_4" class="hidden" style="display: none;">
              <div class="rollBox mt20">
                        <div class="Cont" id="ISL_Cont">
                            <div class="ScrCont">
                                <div id="List1">
                                    <ul>
                                        <li>
                                            <a href="#"><img src="images/img1.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体444</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#"><img src="images/img2.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#"><img src="images/img1.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#"><img src="images/img2.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#"><img src="images/img1.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div id="List2"></div>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                         <script type="text/javascript" src="js/honor.js"></script>
                        <div class="clear"></div>
                </div>
        </div>
    </div>
</div>
<div class="guanggaowei">
     <!-- <a href=""><img src="images/guanggao.jpg" alt="" /></a> -->
</div>
<div class="box3">
    <div class="box3_title">
        <div class="title_left"><a href="">策划咨询<span>/</span></a><span class="small">CEHUAZIXUN</span></div>
        <div class="title_right">
             <ul>
                  <li class="hover" id="cehua1" onMouseover="setTab('cehua',1,4)"><a href="#">打折优惠</a></li>
                   <li class="" id="cehua2" onMouseover="setTab('cehua',2,4)"><a href="#">空挡出售</a></li>
                   <li class="" id="cehua3" onMouseover="setTab('cehua',3,4)"><a href="#">节点推荐</a></li>
                   <li class="" id="cehua4" onMouseover="setTab('cehua',4,4)"><a href="#">新媒体</a></li>
                   <a href=""><img src="images/more.jpg" alt="" /></a>
            </ul>
        </div>
    </div>
    <div class="box3_cone">
        <div id="con_cehua_1" class="display" style="display: block;">
                  <div class="rollBox mt20">
                        <div class="Cont" id="ISL_Cont">
                            <div class="ScrCont">
                                <div id="List1">
                                    <ul>
                                        <li>
                                            <a href="#"><img src="images/img1.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体111</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#"><img src="images/img2.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#"><img src="images/img1.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#"><img src="images/img2.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#"><img src="images/img1.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div id="List2"></div>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                         <script type="text/javascript" src="js/honor.js"></script>
                        <div class="clear"></div>
                </div>
        </div>
        <div id="con_cehua_2" class="hidden" style="display: none;">
                  <div class="rollBox mt20">
                        <div class="Cont" id="ISL_Cont">
                            <div class="ScrCont">
                                <div id="List1">
                                    <ul>
                                        <li>
                                            <a href="#"><img src="images/img1.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体111</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#"><img src="images/img2.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#"><img src="images/img1.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#"><img src="images/img2.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#"><img src="images/img1.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div id="List2"></div>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                         <script type="text/javascript" src="js/honor.js"></script>
                        <div class="clear"></div>
                </div>
        </div>
        <div id="con_cehua_3" class="hidden" style="display: none;">
              <div class="rollBox mt20">
                        <div class="Cont" id="ISL_Cont">
                            <div class="ScrCont">
                                <div id="List1">
                                    <ul>
                                        <li>
                                            <a href="#"><img src="images/img1.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体111</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#"><img src="images/img2.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#"><img src="images/img1.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#"><img src="images/img2.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#"><img src="images/img1.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div id="List2"></div>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                         <script type="text/javascript" src="js/honor.js"></script>
                        <div class="clear"></div>
                </div>
        </div>
        <div id="con_cehua_4" class="hidden" style="display: none;">
              <div class="rollBox mt20">
                        <div class="Cont" id="ISL_Cont">
                            <div class="ScrCont">
                                <div id="List1">
                                    <ul>
                                        <li>
                                            <a href="#"><img src="images/img1.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体111</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#"><img src="images/img2.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#"><img src="images/img1.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#"><img src="images/img2.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#"><img src="images/img1.jpg" /></a>
                                            <div class="bto-gu">
                                                <h1><a href="">公交站亭媒体</a></h1>
                                                <p><a href="">到达率高、千人成本低、有效覆盖、范围广、贴近消费者</a></p>
                                                <a href=""><span>MORE</span></a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div id="List2"></div>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                         <script type="text/javascript" src="js/honor.js"></script>
                        <div class="clear"></div>
                </div>
        </div>
    </div>
</div>
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
<div class="box4">
	<div class="box4_left">
    	<div class="box_Title">
      		<ul>
        		<li class="hover" id="lef1" onMouseover="setTab('lef',1,4)"><a href="#">招商信息</a></li>
        		<li class="" id="lef2" onMouseover="setTab('lef',2,4)"><a href="#">招标信息</a></li>
        		<li class="" id="lef3" onMouseover="setTab('lef',3,4)"><a href="#">新闻资讯</a></li>
            </ul>
            <div class="clear"></div>
         </div>
         <div id="con_lef_1" class="display" style="display: block;">
              <div class="con_box4">
         	  <div class="con_left">
         		<a href=""><img src="images/image1.jpg" /></a>
                <a href=""><h1>全球最顶尖广告...</h1></a>
                <p>来到中国近十年,全球知名的独立广告公司W+K却一直没有在...<span><a href="" class="red">[详情]</a></span></p>
         	  </div>
                 <div class="con_right">
            	<div class="li_con">
                	<span class="span_num">01</span>
                    <div class="squ"></div>
                    <div class="li_conrg">
                    	<p class="li_title"><a href="">全球最大广告公司的当家人...</a><span>2016-05-04</span></p>
                        <p class="li_jianjie"><a href="">来到中国近十年,全球知名的独...</a></p>
                    </div>
                </div>
                <div class="li_con">
                    <span class="span_num">02</span>
                    <div class="squ"></div>
                    <div class="li_conrg">
                        <p class="li_title"><a href="">全球最大广告公司的当家人...</a><span>2016-05-04</span></p>
                        <p class="li_jianjie"><a href="">来到中国近十年,全球知名的独...</a></p>
                    </div>
                </div>
                <div class="li_con">
                    <span class="span_num">03</span>
                    <div class="squ"></div>
                    <div class="li_conrg">
                        <p class="li_title"><a href="">全球最大广告公司的当家人...</a><span>2016-05-04</span></p>
                        <p class="li_jianjie"><a href="">来到中国近十年,全球知名的独...</a></p>
                    </div>
                </div>
                <div class="li_con">
                    <span class="span_num">04</span>
                    <div class="squ"></div>
                    <div class="li_conrg">
                        <p class="li_title"><a href="">全球最大广告公司的当家人...</a><span>2016-05-04</span></p>
                        <p class="li_jianjie"><a href="">来到中国近十年,全球知名的独...</a></p>
                    </div>
                </div>
                </div>
              </div>
        </div>
         <div id="con_lef_2" class="hidden" style="display: none;">
              <div class="con_box4">
         	  <div class="con_left">
         		<a href=""><img src="images/image1.jpg" /></a>
                <a href=""><h1>全球最顶尖广告22...</h1></a>
                <p>来到中国近十年,全球知名的独立广告公司W+K却一直没有在...<span><a href="" class="red">[详情]</a></span></p>
         	  </div>
                 <div class="con_right">
            	<div class="li_con">
                	<span class="span_num">01</span>
                    <div class="squ"></div>
                    <div class="li_conrg">
                    	<p class="li_title"><a href="">全球最大广告公司的当家人...</a><span>2016-05-04</span></p>
                        <p class="li_jianjie"><a href="">来到中国近十年,全球知名的独...</a></p>
                    </div>
                </div>
                <div class="li_con">
                    <span class="span_num">02</span>
                    <div class="squ"></div>
                    <div class="li_conrg">
                        <p class="li_title"><a href="">全球最大广告公司的当家人...</a><span>2016-05-04</span></p>
                        <p class="li_jianjie"><a href="">来到中国近十年,全球知名的独...</a></p>
                    </div>
                </div>
                <div class="li_con">
                    <span class="span_num">03</span>
                    <div class="squ"></div>
                    <div class="li_conrg">
                        <p class="li_title"><a href="">全球最大广告公司的当家人...</a><span>2016-05-04</span></p>
                        <p class="li_jianjie"><a href="">来到中国近十年,全球知名的独...</a></p>
                    </div>
                </div>
                <div class="li_con">
                    <span class="span_num">04</span>
                    <div class="squ"></div>
                    <div class="li_conrg">
                        <p class="li_title"><a href="">全球最大广告公司的当家人...</a><span>2016-05-04</span></p>
                        <p class="li_jianjie"><a href="">来到中国近十年,全球知名的独...</a></p>
                    </div>
                </div>
                </div>
              </div>
        </div>
         <div id="con_lef_3" class="hidden" style="display: none;">
              <div class="con_box4">
         	  <div class="con_left">
         		<a href=""><img src="images/image1.jpg" /></a>
                <a href=""><h1>全球最顶尖广告33...</h1></a>
                <p>来到中国近十年,全球知名的独立广告公司W+K却一直没有在...<span><a href="" class="red">[详情]</a></span></p>
         	  </div>
                 <div class="con_right">
            	<div class="li_con">
                	<span class="span_num">01</span>
                    <div class="squ"></div>
                    <div class="li_conrg">
                    	<p class="li_title"><a href="">全球最大广告公司的当家人...</a><span>2016-05-04</span></p>
                        <p class="li_jianjie"><a href="">来到中国近十年,全球知名的独...</a></p>
                    </div>
                </div>
                <div class="li_con">
                    <span class="span_num">02</span>
                    <div class="squ"></div>
                    <div class="li_conrg">
                        <p class="li_title"><a href="">全球最大广告公司的当家人...</a><span>2016-05-04</span></p>
                        <p class="li_jianjie"><a href="">来到中国近十年,全球知名的独...</a></p>
                    </div>
                </div>
                <div class="li_con">
                    <span class="span_num">03</span>
                    <div class="squ"></div>
                    <div class="li_conrg">
                        <p class="li_title"><a href="">全球最大广告公司的当家人...</a><span>2016-05-04</span></p>
                        <p class="li_jianjie"><a href="">来到中国近十年,全球知名的独...</a></p>
                    </div>
                </div>
                <div class="li_con">
                    <span class="span_num">04</span>
                    <div class="squ"></div>
                    <div class="li_conrg">
                        <p class="li_title"><a href="">全球最大广告公司的当家人...</a><span>2016-05-04</span></p>
                        <p class="li_jianjie"><a href="">来到中国近十年,全球知名的独...</a></p>
                    </div>
                </div>
                </div>
              </div>
        </div>
    </div>
    <div class="box4_right">
        <div class="box_Title">
                <li class="hover" id="lefa1" onMouseover="setTab('lefa',1,3)"><a href="#">求购信息</a></li>
                <li class="" id="lefa2" onMouseover="setTab('lefa',2,3)"><a href="#">晒单信息</a></li>
                <li class="" id="lefa3" onMouseover="setTab('lefa',3,3)"><a href="#">出售资讯</a></li>
            </ul>
            <div class="clear"></div>
         </div>
         <div id="con_lefa_1" class="display" style="display: block;">
             <div class="conr_top">
                 <a href=""><img src="images/image1.jpg" /></a>
                 <p class="paa">
                     <span class="topic"><a href="#">全球最大广告公司的当家人...</a></span><br />
                     <span class="miaoshu">来到中国近十年,全球知名的独全球知名全球知名全球知名全球知名全球知名全球知名全球知名...<a href="" class="red">[详情]</a></span>
                 </p>
                 <p class="data_right">
                     <span class="da_big">08</span><br/>
                     <span>2015-06</span>
                 </p>
             </div>
             <ul class="lii">
                 <li><a href="">全球最大广告公司的当家人全球最大广告公司的当家人<span>2016-05-04</span></a></li>
                 <li><a href="">全球最大广告公司的当家人全球最大广告公司的当家人<span>2016-05-04</span></a></li>
                 <li><a href="">全球最大广告公司的当家人全球最大广告公司的当家人<span>2016-05-04</span></a></li>
                 <li><a href="">全球最大广告公司的当家人全球最大广告公司的当家人<span>2016-05-04</span></a></li>
                 <li><a href="">全球最大广告公司的当家人全球最大广告公司的当家人<span>2016-05-04</span></a></li>
             </ul>
         </div>
         <div id="con_lefa_2" class="hidden" style="display: none;">
             <div class="conr_top">
                 <a href=""><img src="images/image1.jpg" /></a>
                 <p class="paa">
                     <span class="topic"><a href="#">全球最大广告公司的当家人...</a></span><br />
                     <span class="miaoshu">来到中国近十年,全球知名的独全球知名全球知名全球知名全球知名全球知名全球知名全球知名...<a href="" class="red">[详情]</a></span>
                 </p>
                 <p class="data_right">
                     <span class="da_big">09</span><br/>
                     <span>2015-06</span>
                 </p>
             </div>
             <ul class="lii">
                 <li><a href="">全球最大广告公司的当家人全球最大广告公司的当家人<span>2016-05-04</span></a></li>
                 <li><a href="">全球最大广告公司的当家人全球最大广告公司的当家人<span>2016-05-04</span></a></li>
                 <li><a href="">全球最大广告公司的当家人全球最大广告公司的当家人<span>2016-05-04</span></a></li>
                 <li><a href="">全球最大广告公司的当家人全球最大广告公司的当家人<span>2016-05-04</span></a></li>
                 <li><a href="">全球最大广告公司的当家人全球最大广告公司的当家人<span>2016-05-04</span></a></li>
             </ul>
         </div>
         <div id="con_lefa_3" class="hidden" style="display: none;">
             <div class="conr_top">
                 <a href=""><img src="images/image1.jpg" /></a>
                 <p class="paa">
                     <span class="topic"><a href="#">全球最大广告公司的当家人...</a></span><br />
                     <span class="miaoshu">来到中国近十年,全球知名的独全球知名全球知名全球知名全球知名全球知名全球知名全球知名...<a href="" class="red">[详情]</a></span>
                 </p>
                 <p class="data_right">
                     <span class="da_big">10</span><br/>
                     <span>2015-06</span>
                 </p>
             </div>
             <ul class="lii">
                 <li><a href="">全球最大广告公司的当家人全球最大广告公司的当家人<span>2016-05-04</span></a></li>
                 <li><a href="">全球最大广告公司的当家人全球最大广告公司的当家人<span>2016-05-04</span></a></li>
                 <li><a href="">全球最大广告公司的当家人全球最大广告公司的当家人<span>2016-05-04</span></a></li>
                 <li><a href="">全球最大广告公司的当家人全球最大广告公司的当家人<span>2016-05-04</span></a></li>
                 <li><a href="">全球最大广告公司的当家人全球最大广告公司的当家人<span>2016-05-04</span></a></li>
             </ul>
         </div>
    </div>
</div>
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
