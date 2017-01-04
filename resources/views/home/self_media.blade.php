@include('layouts.header')
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


                <div class="fie_con">
                    <div class="face">
                        <img src="{{asset('resources/views/home/images/50.jpg')}}" alt="{{$v['user_name']}}">
                    </div>
                    <div class="fie_right">
                        <p class="name"><a href="#"><span style="color:#FF6600">{{$v['user_name']}}</span></a></p>

                        <p class="datae">
                            <span> {{$v['created_at']}}</span>
                            <span>来自{{$v['user_name']}}</span>


                        </p>

                        <p class="nei">
                          <span>

                            {!!$v['content']!!}
                          </span>
                            <a onclick="jumpFrame({{$v['media_id']}})"><img class="pack"
                                                                            src="{{asset('resources/views/home/images/pack.jpg')}}">
                            </a>
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
