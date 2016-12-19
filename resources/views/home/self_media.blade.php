@include('layouts.header')


<body onload="time()">
<!-- data for weixin share -->


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



<input type="hidden" class="session_user" value=
@if( session('user'))
        "{{session('user')->user_name}}"
@else
    ""
@endif >


<div class="zi">
    <div class="title_zi">
    </div>
    <div class="zi_con">
        <div class="zicon-left">

            <!-- wechat share loading -->
            <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js" charset="utf-8"></script>


            @include('layouts.widget.newsinput')
            <div class="lis">
                <ul>


                </ul>
              
            </div>


            @foreach($self_medias as $k=>$v)

                <div class="fie_con">
                    <div class="face">
                        <img src="{{asset('resources/views/home/images/50.jpg')}}" alt="{{$v->user_name}}">
                    </div>
                    <div class="fie_right">
                        <p class="name"><a href="#"><span style="color:#FF6600">{{$v['user_name']}}</span></a></p>
                        <p class="datae">
                            <span> {{$v['created_at']}}</span>
                            <span>来自{{$v['user_name']}}</span>
                            <a><h1>
                                    <span onclick="jumpFrame({{$v['media_id']}})">
                                      点击分享送红包啦!
                                    </span>
                                </h1>
                            </a>

                        </p>
                        <p class="nei">
                          <span>

                            {!!$v['content']!!}
                          </span>

                            {{--                            <img src="{{asset('resources/views/home/images/photos.jpg')}}" alt="11111111111111">--}}
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
                        <a href="http://127.0.0.48:89/ZIMEITI/list.php?catid=9"><span
                                    style="color:#FF6600">最新视频拍摄</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
@include('layouts.widget.jump')


</body></html>
