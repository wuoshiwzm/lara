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
        @foreach($data as $offer)
        <h3>{{$offer->offer_title}}</h3>

        <ul>
            <p>{!!$offer->offer_content!!}...</p>
            <a title="{{$offer->offer_title}}" href="{{url('offer/'.$offer->offer_id)}}"
               target="_blank" class="readmore">阅读全文>></a>
        </ul>
        <p class="dateview">
            <span>　{{date('Y-m-d',strtotime($offer->updated_at))}}</span>
            <span>作者：{{$offer->offer_editor}}</span></p>
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


</body></html>
