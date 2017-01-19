@include('layouts.header')
<style>
    .new_row {width: 807px; height: 130px;  border-bottom: 2px solid #eee; padding: 5px 0; position: relative;}
    .new_row .new_img {float: left;}
    .new_row a img {width: 120px; height: 120px;}
    .new_row .news_title {float: left; width: 480px; height: 70px; line-height: 30px; overflow: hidden;}
    .new_row .news_title h3 { min-height: 40px; font-size: 20px; padding: 10px 20px;}
    .new_row .news_time {position: absolute; left: 140px; bottom: 14px;}
    .new_row .news_time span {font-size: 14px; color: ;}
    .new_row .news_time a {margin-left: 12px;}
    .new_row .news_btn {position: absolute; right: 20px; bottom: 14px;}
    .new_row .news_btn img {width: 196px; height: 66px;}
</style>

<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js" charset="utf-8"></script>
<link href="{{asset('resources/views/home/css/pack.css')}}" rel="stylesheet">

<body onload="time()">
<!-- data for weixin share -->


<div class="top">
    <div class="wrappersy">
        <div class="logo">
            <a href=" {{url('')}}">
                <img src="{{asset('resources/views/home/images/logo.jpg')}}"></a>
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
            @include('layouts.widget.newsinput')

            <div class="lis">
                <ul>


                </ul>

            </div>


            @foreach($self_medias as $v)
                <div class="new_row">
                    <a class="new_img" href="">
                        @if($v['headimg'])
                        <img src="{{$v['headimg']}}" />
                        @else
                        <img src="{{asset('resources/views/home/images/50.jpg')}}" />
                        @endif
                    </a>
                    <div>
                        <div class="news_title">
                            <h3><a href="javascript:jumpFrame({{$v['media_id']}});" target="_blank">{{$v['title']}}</a></h3>
                        </div>
                        <div class="news_time">
                            <span> {{$v['created_at']}}</span>&nbsp;&nbsp;
                            @if($v['nickname'])
                            <span>来自{{$v['nickname']}}</span>
                            @else
                            <span>来自{{$v['user_name']}}</span>
                            @endif
                            <a href="javascript:jumpFrame({{$v['media_id']}});" target="_blank">阅读全文</a>
                        </div>
                        <div class="news_btn"> <a onclick="jumpFrame({{$v['media_id']}})"><img class="pack"
                                                                            src="{{asset('resources/views/home/images/pack.jpg')}}">
                            </a></div>
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

                @foreach($pushMedia as $media)
                    <span onclick="jumpFrame({{$media['media_id']}})">
                    <li> {{mb_substr($media['title'],0,12,'utf-8')}}... <span>{{date('m-d',strtotime($media['created_at']))}}</span></li>

                @endforeach

            </div>
            <div class="zicr_bottom">
                <h1>分享排行</h1>
                <ul>
                    @foreach($topShareMedia as $media)
                        <li>
                            </a><span onclick="jumpFrame({{$media['media_id']}})"
                                      style="color:#FF6600">{{mb_substr($media['title'],0,12,'utf-8')}}...</span>
                        </li>

                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
@include('layouts.widget.jump')


</body></html>
