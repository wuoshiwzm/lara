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
        <a href="{{url('')}}">首页</a> > 关于我们</div>
    <div class="zw">
        <h2 style="text-align:center;">关于我们</h2>
        <div class="tex">
            <p>无穷大是一个集合广告资源，宣传策划，设计制作及全民推手的专业性广告信息服务平台。
 旨在帮广告主将广告资源全面、精准的展示出来让需求者更直观、更简单的了解每一个广告媒介。是一个真正帮广告主、需求者、企业、个人赚钱的专业性网站。<br>

1、问：无穷大是什么？<br>
   答：无穷大广告网络服务平台， 是一个集合广告资源，宣传策划，设计制作，招商招标及全民推手等专业性的行业信息整合平台。<br>

2、问：无穷大能干什么？<br>
   答：能赚钱！还能让用户以最快最全面最详细的了解当下主流媒体的动态。<br>

3、问：无穷大都包括什么？<br>
   答：广告资源，宣传策划，设计制作，招商招标，全民推手，招贤纳士等。操作简单明了，只要动动手什么都会有！<br>
4、问：无穷大的优势是什么？<br>
    1：行业信息类<br>
 答：更全面更详细的展示每个广告媒体信息，包括媒体形式，投放周期，最快投放时间等等。不仅省了销售人员的时间，而且为需求者更是提供了最为准确的信息<br>

    2：招贤纳士<br>
   答：完全免费！针对性比较强，可以更直观的找到自己想要的各种人才，省时省力更省钱！<br>

5、  问：无穷大全民推手是什么？<br>
   答：分享经济的有效产物！发布私人专属推广方案，点击浏览并分享即可互利共赢。效果可想而知<br>


6、  问：无穷大未来的发展方向是什么？<br>
     答：无穷大旨在打造全面详细简单的行业信息服务类网站，让广告人可以更轻松的展示信息，更简单的签单。再也不怕酒香出不了巷！让需求者更直观更准确的找到适合自己产品的媒体。把营销活动变成一件轻松的娱乐活动。<br>
</p>
        </div>
    </div>
</div>



@include('layouts.footer')




</body></html>
