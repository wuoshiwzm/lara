@include('layouts.header')
<body onload="time()">

<div class="top">
    <div class="wrappersy">
        <div class="logo">
            <a href=""><img src="{{asset('resources/views/home/images/logo.jpg')}}"></a>
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


<script type="text/javascript">var i = 30;</script>


<div class="content" style="margin-left: 20%;
margin-right: 20%;">


    <!-- <h1>contents here</h1> -->


    <div class="cates">
        <!-- the value passed from controller: allChild  allCates -->
        {{--@foreach($allCates as $k=>$v)--}}
            {{--@foreach($v as $a=>$b)--}}
                {{--<a href="{{url('cate/'.$b->cate_id)}}">--}}
                    {{--@if($b['cate_id']==$cate_id)--}}
                        {{--<span style="color:red">--}}
                    {{--@endif--}}
                    {{--{{$b->cate_name}}</a>--}}
                {{--@if($b['cate_id']==$cate_id)--}}
                {{--</span>--}}
                {{--@endif--}}
                {{--</a>--}}
            {{--@endforeach--}}
            {{--<hr>--}}
        {{--@endforeach--}}
    </div>




    <div class="bloglist left">
        @foreach($data as $news)
        <h3>{{$news->news_title}}</h3>

        <ul>
            <p>{!!$news->news_content!!}...</p>
            <a title="{{$news->news_title}}" href="{{url('news/'.$news->news_id)}}"
               target="_blank" class="readmore">阅读全文>></a>
        </ul>
        <p class="dateview">
            <span>　{{date('Y-m-d',strtotime($news->updated_at))}}</span>
            <span>作者：{{$news->news_editor}}</span></p>
        @endforeach
        <div class="page">
            {!!$data->links()!!}
        </div>

    </div>

    <!-- <h1>content</h1> -->
    <div class="clear"></div>


</div>
@include('layouts.sidebar')


@include('layouts.footer')
<script type="text/javascript">
    var destoon_userid = 0;
    var destoon_username = '';
    var destoon_message = 0;
    var destoon_chat = 0;
    var destoon_cart = get_cart();
    var destoon_member = '';
    destoon_member += '欢迎，<span class="f_red">客人</span> | <a href="http://127.0.0.48:89/member/login.php">请登录</a> | <a href="http://127.0.0.48:89/member/register.php">免费注册</a> | <a href="http://127.0.0.48:89/member/send.php">忘记密码?</a>';
    $('#destoon_member').html(destoon_member);
</script>

</body></html>
