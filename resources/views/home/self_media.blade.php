@include('layouts.header')





<body onload="time()">
<!-- data for weixin share -->
  <input type="hidden" id="timestamp" value={{$timestamp}}>
  <input type="hidden" id="nonceStr" value={{$nonceStr}}>
  <input type="hidden" id="signature" value={{$signature}}>



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
    <div class="ny_banner">
      <img src="{{asset('resources/views/home/images/banner.jpg')}}">
    </div>





     <div class="zi">
         <div class="title_zi">
         </div>
         <div class="zi_con">
             <div class="zicon-left">

               <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js" charset="utf-8"></script>
               <script type="text/javascript" src="{{asset('resources/views/home/js/share.js')}}"></script>
               <wb:share-button addition="number" type="button" ralateUid="6016036905"></wb:share-button>
                  <h1 onclick="test()"> here the js </h1>
                        @include('layouts.widget.newsinput')
                        <div class="lis">
                    <ul>
                    <li class="select"><a href="#">全部</a></li>
                    <li><a href="#">原创</a></li>
                    <li><a href="#">视频</a></li>
                    <li><a href="#">图片</a></li>
                    <li><a href="#">音乐</a></li>
                    <li><a href="#">文章</a></li>
                    <!-- <li><a href="">视频</a></li>
                    <li><a href="">图片</a></li>
                    <li><a href="">音乐</a></li>
                    <li><a href="">文章</a></li> -->
                    </ul>
                    <div class="wes">
                      <input type="text" class="weisou">
                      <input type="button" class="weisoua">
                    </div>
                 </div>

                 <!-- 文章内容 -->
                 <div class="fie_con">
                      <div class="face">
                             <img src="{{asset('resources/views/home/images/50.jpg')}}" alt="">
                      </div>
                      <div class="fie_right">
                          <p class="name"><a href="http://bq.com/ZIMEITI/"><span style="color:#FF6600">最新视频拍摄</span></a></p>
                          <p class="datae"><span>2016-07-22 14:42</span> <span>来自admin</span>
                            <span style="float:right;">
                              <!-- JiaThis Button BEGIN -->
                                  <script "text/javascript">
                                  var jiathis_config = {
                                  	url: "http://www.yourdomain.com",
                                  	title: "自定义网页标题 #话题#",
                                  	summary:"分享的文本摘要"
                                  }
                                  </script>
                                  <span id="ckepop">
                                  <span class="jiathis_txt">分享到：</span>

                                  <a class="jiathis_button_weixin">微信分享</a>
                                  <a class="test">微信分享TEST</a>
                                  <a class="jiathis_button_tsina">新浪微博</a>
                                  <a class="jiathis_button_douban"></a>
                                  <a class="jiathis_button_qzone">QQ空间</a>
                                  <a class="jiathis_button_tools_1"></a>
                                  <a class="jiathis_button_tools_2"></a>

                                  </span>




                                  <!-- <script type="text/javascript" src="http://v2.jiathis.com/code/jia.js" charset="utf-8"></script> -->


                                  <!-- JiaThis Button END -->
                                </span>


                          </p>
                          <p class="nei">
                          <span>
                            最新视频拍摄最新视频拍摄最新视频拍摄最新视频拍摄最新视频拍摄最新视频拍摄最新视频拍摄最新视频拍摄
                          </span>
                                <img src="{{asset('resources/views/home/images/photos.jpg')}}" alt="名字名字名字名字名字名字名字">
                                <img src="{{asset('resources/views/home/images/photos.jpg')}}" alt="11111111111111">
                          </p>
                      </div>
                      <div class="clear"></div>
                      <div class="fie_bottom">
                      </div>
                 </div>


                 @foreach($self_medias as $k=>$v)

                 <div class="fie_con">
                      <div class="face">
                             <img src="{{asset('resources/views/home/images/50.jpg')}}" alt="{{$v->user_name}}">
                      </div>
                      <div class="fie_right">
                          <p class="name"><a href="#"><span style="color:#FF6600">{{$v->user_name}}</span></a></p>
                          <p class="datae"><span> {{$v->created_at}}</span> <span>来自{{$v->user_name}}</span>
                            <span style="float:right;">
                              <!-- JiaThis Button BEGIN -->
                                  <script "text/javascript">
                                  var jiathis_config = {
                                    url: "http://www.yourdomain.com",
                                    title: "自定义网页标题 #话题#",
                                    summary:"分享的文本摘要"
                                  }
                                  </script>
                                  <span id="ckepop">
                                  <span class="jiathis_txt">分享到：</span>

                                  <a class="jiathis_button_weixin">微信分享</a>
                                  <a class="jiathis_button_tsina">新浪微博</a>
                                  <!-- <a class="jiathis_button_douban"></a> -->
                                  <a class="jiathis_button_qzone" >QQ空间</a>
                                  <a class="jiathis_button_tools_1"></a>
                                  <a class="jiathis_button_tools_2"></a>

                                  </span>
                                  <script type="text/javascript" src="http://v2.jiathis.com/code/jia.js" charset="utf-8"></script>
                                  <!-- JiaThis Button END -->
                                </span>


                          </p>
                          <p class="nei">
                          <span>
                            {!!   $v->content !!}
                          </span>
                                <img src="{{asset('resources/views/home/images/photos.jpg')}}" alt="名字名字名字名字名字名字名字">
                                <img src="{{asset('resources/views/home/images/photos.jpg')}}" alt="11111111111111">
                          </p>
                      </div>
                      <div class="clear"></div>
                      <div class="fie_bottom">
                      </div>
                 </div>
                 @endforeach





                  <div class="lis bta">
                        <a href="" class="morea">查看更多>></a>
                 </div>
             </div>
             <div class="zicon-right">
                 <!-- <div class="zicr_top">
                     <a href=""><img src="#" alt=""></a>
                     <p class="name"><a href="">姓名</a></p>
                     <div>
                         <p><span class="big">10</span><span>关注</span></p>
                         <p class="squar"></p>
                         <p> <span class="big">8</span><span>粉丝</span></p>
                         <p class="squar"></p>
                         <p> <span class="big">8</span><span>分享</span></p>
                     </div>
                 </div> -->
                 <div class="zicr_midden">
                     <h1>推荐分享</h1>
                    <li><a href="">#徐佳莹我所需要的#</a><span>12-25</span></li>
                     <li><a href="">#宇宙夫妇#</a><span>12-33</span></li>
                     <li><a href="">#你能陪陪我吗#</a><span>12-12</span></li>
                     <li><a href="">#张睿直播送钱#</a><span>12-15</span></li>
                     <li><a href="">#极限挑战#</a><span>12-15</span></li>
                     <li><a href="">#特工皇妃主演#</a><span>12-15</span></li>
                     <li><a href="">#多花点时间来陪我#</a><span>12-15</span></li>
                     <li><a href="">#陈奕迅演唱会有票#</a><span>12-15</span></li>
                 </div>
                 <div class="zicr_bottom">
                     <h1>分享排行</h1>
                     <ul>
                       <li>
                         <a href="http://127.0.0.48:89/ZIMEITI/list.php?catid=9"><img src="#" alt=""></a>
                         <a href="http://127.0.0.48:89/ZIMEITI/list.php?catid=9"><span style="color:#FF6600">最新视频拍摄</span></a>
                       </li>
                     </ul>
                 </div>
             </div>
         </div>
     </div>

@include('layouts.footer')




</body></html>