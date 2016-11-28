@include('layouts.header')
<!-- 文章内容 - 广告资源 -->

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

  <!-- 内容部分 -->

<div class="xiangqing">
  <div class="ny_top">当前位置：
    <a href="{{url('')}}">首页</a> >
    <a href="{{url('cate')}}">广告资源</a> >
    <a href="{{url('cate/'.$field->cate_id)}}">{{$cate_info->cate_name}}</a> > 正文</div>
  <div class="zw">
    <div class="fbr"><a href="#">发布人：{{$field->art_editor}}</a></div>
    <div class="news-title-sub">{{$field->art_title}}</div>
    <div class="fbt">发布时间：{{$field->created_at}}　　浏览次数：{{$field->art_view}}次</div>

    <div class="tex">

<img src="{{$field->art_thumb}}" alt="" />
<hr>

    <strong>{{$field->art_description}}</strong><br><br>
    <hr>
    {!!$field->art_content!!}


</div>
<div class="pian">
       <a href=
        @if($article['pre'])
        "{{url('a1/'.$article['pre']->art_id)}}"
          >上一篇
        @endif
       </a><br>
       <a href=
      @if($article['next'])
      "{{url('a/'.$article['next']->art_id)}}"
        >下一篇
      @endif
    </a>
      </div>
  </div>
</div>



@include('layouts.footer')




</body></html>
