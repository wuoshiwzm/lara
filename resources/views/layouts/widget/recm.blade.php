<div class="box3">


    <div class="box3_title">
        <div class="title_left"><a href="">精品推荐<span>/</span></a><span class="small">JINGPINTUIJIAN</span></div>
        <div class="title_right">
            <ul>
                @foreach($recm as $k => $r)
                    <li class="@if($k == 0) hover @endif" id="tuijian{{$k+1}}"
                        onMouseover="setTab('tuijian',{{$k+1}},4)">{{array_keys($r)[0]}}<a href="#">
                        </a></li>
                @endforeach
                <a href="{{url('cate')}}" target="_blank"><img src="{{asset('resources/views/home/images/more.jpg')}}"
                                                               alt=""/></a>
            </ul>
        </div>
    </div>
    <div class="box3_cone">
        @foreach($recm as $k => $v)
            <div id="con_tuijian_{{$k+1}}" class="@if($k == 0) display @else hidden  @endif"
                 style="display: @if($k == 0) block @else none  @endif;">
                <div class="rollBox mt20">
                    <div class="LeftBotton" onmousedown="ISL_GoUp()" onmouseup="ISL_StopUp()"
                         onmouseout="ISL_StopUp()"></div>
                    <div class="RightBotton" onmousedown="ISL_GoDown()" onmouseup="ISL_StopDown()"
                         onmouseout="ISL_StopDown()"></div>
                    <div class="Cont" id="ISL_Cont">
                        <div class="ScrCont">
                            <div id="List1">
                                <!-- 文章循环 -->

                                <ul>
                                    @if(isset($v))
                                        @foreach(array_values($v)[0] as $arts)
                                            <li>
                                                <a href="#"><img src="{{asset($arts->art_thumb)}}"/></a>
                                                <div class="bto-gu">
                                                    <h1><a href="">{{$arts->art_thumb}}</a></h1>
                                                    <p><a href="">{{$arts->created_at}}</a></p>
                                                    <a href="{{url('a/'.$arts->art_id)}}"><span>MORE</span></a>
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            <div id="List2"></div>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <script type="text/javascript" src="{{asset('resources/views/home/js/honor.js')}}"></script>
                    <!--   -->
                    <div class="clear"></div>
                </div>
            </div>
        @endforeach

    </div>
</div>
