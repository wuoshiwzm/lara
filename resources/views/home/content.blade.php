@include('layouts.header')



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

        @include('layouts.widget.page_banner')


<div class="xiangqing">
  <div class="ny_top">当前位置：<a href="#">首页</a> > <a href="#">新闻资讯</a> > <a href="#">热点新闻</a> > 正文</div>
  <div class="zw">
    <div class="fbr"><a href="#">发布人：张小二</a></div>
    <div class="news-title-sub">真诚期待与您的合作</div>
    <div class="fbt">发布时间：16-06-02　　浏览次数：3次</div>
    <div class="tex">
    同妤纹绣创建于2004年6月，以卓越的技术实力打造着蜚声西北知名的品牌，集医师、高新科技、高端设备之大成，率先采用全新服务管理模式和全球优质技术资源，采用“U+美丽定制 数字化整形技术”理念，用臻于完美的专业整形美容技术及服务，实现从外表、形体、心理、社交、修养等多层面的全面美丽提升。<br>
    <strong>机构认证 技术保障</strong><br>
« 西北地区专业塑美的美容整形机构<br>
« 陕西省第二人民医院医疗技术援助单位<br>
« 西安市城镇居民医保定点医院<br>
« 西安市城镇职工医保定点医院<br>
<strong>整形美容专区</strong><br>致力于全方位聆听女性心声，将医术与艺术融为一体，采用领先整形技术，现代化高科技仪器，专业医师精湛技艺，专业周到的服务体系，形成“尊享、关怀、专精、时尚、可续”的整形美容新模式。每一处细节都闪耀着奢华的智慧与格调，倾心雕琢您的美丽梦想。
<br><img src="images/small_banner.jpg">
</div>
<div class="pian">
      [<strong>上一篇</strong>]：<a href="#">上一篇上一篇上一篇上一篇上一篇上一篇上一篇上一篇</a><br>
      [<strong>下一篇</strong>]：<a href="#">下一篇下一篇下一篇下一篇下一篇下一篇下一篇</a>
      </div>
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
</body>
</html>
