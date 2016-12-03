@include('layouts.header')
<!-- 文章内容 - 广告资源 -->

<body onload="time()">
<!-- data for weixin share -->


<input type="hidden" class="session_user" value=
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

<!-- 内容部分 -->

<div class="xiangqing">
    <div class="ny_top">当前位置：
        <a href="{{url('')}}">首页</a> >
        <a href="{{url('offer_all')}}">求购信息</a> > 正文
    </div>
    <div class="zw">
        <div class="fbr"><a href="#">发布人：{{$field->offer_editor}}</a></div>
        <div class="offer-title-sub">对应资源：{{$field->cate_name}}</div>
        <div class="fbt">发布时间：{{date('Y-m-d',strtotime($field->created_at))}}　　浏览次数：{{$field->offer_view}}次</div>

        <div class="tex">


            <hr>


            <hr>
            {!!$field->offer_content!!}


        </div>
        <div class="pian">
            <a href=
               @if($offer['pre'])
                       "{{url('offer/'.$offer['pre']->offer_id)}}"
            >上一篇
                @endif
            </a><br>
            <a href=
               @if($offer['next'])
                       "{{url('offer/'.$offer['next']->offer_id)}}"
            >下一篇
                @endif
            </a>
        </div>
    </div>
</div>


@include('layouts.footer')


</body></html>
