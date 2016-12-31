<div class="box4">
    <div class="box4_left">
        <div class="box_Title">
            <ul>
                <li class="hover" id="lef3" onMouseover="setTab('lef',3,4)"><a href="#">新闻资讯</a></li>
            </ul>
            <div class="clear"></div>
        </div>

        <div id="con_lef_3" class="hover" style="display: block;">
            <div class="con_box4">
                @if(isset($news))
                    @foreach($news as $k => $v)
                        @if($k == 0)

                            <div class="con_left">
                                <a href="{{url('news/'.$v->news_id)}}"><img src="{{$v->art_thumb}}"/></a>
                                <a href="{{url('news/'.$v->news_id)}}"><h1>{{$v->news_title}}...</h1></a>
                                <p><?php echo mb_substr($v->news_content, 0, 15) ?>...<span><a href="{{url('news/'.$v->news_id)}}"
                                                                                            class="red">[详情]</a></span>
                                </p>
                            </div>
                        @endif
                    @endforeach
                @endif


                <div class="con_right">
                    @if(isset($news))
                        @foreach($news as $k => $v)
                            <div class="li_con">
                                <span class="span_num">0{{$k}}</span>
                                <div class="squ"></div>
                                <div class="li_conrg">
                                    <p class="li_title"><a href="{{url('news/'.$v->news_id)}}">{{$v->news_title}}...</a><span>{{date('Y-m-d',strtotime($v->created_at))}}</span></p>
                                    <p class="li_jianjie"><a href="{{url('news/'.$v->news_id)}}"><?php echo mb_substr($v->news_content, 0, 15) ?>
                                            ...</a>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>


        </div>
    </div>


    <div class="box4_right">
        <div class="box_Title">
            <li class="hover" id="lefa1" onMouseover="setTab('lefa',1,3)"><a href="#">求购信息</a></li>

            </ul>
            <div class="clear"></div>
        </div>
        <div id="con_lefa_1" class="display" style="display: block;">

            @if(isset($offer[0]))

            <div class="conr_top">
                <a href="{{url('offer/'.$offer[0]->offer_id)}}"><img src="{{$offer[0]->art_thumb}}"/></a>
                <p class="paa">
                    <span class="topic"><a href="{{url('offer/'.$offer[0]->offer_id)}}">{{$offer[0]->offer_title}}..</a></span><br/>
                    <span class="miaoshu"><?php echo substr($offer[0]->offer_content, 0, 15) ?>..<a href="{{url('offer/'.$offer[0]->offer_id)}}" class="red">[详情]</a></span>
                </p>
                <p class="data_right">
                    <span class="da_big"><?php echo date('m', strtotime($offer[0]->created_at)) ?> </span><br/>

                    <span><?php echo date('Y-m', strtotime($offer[0]->created_at)) ?> </span>
                </p>
            </div>
            @endif


            <ul class="lii">
                @if(isset($offer))
                    @foreach($offer as $k => $v)
                        <li><a href="{{url('offer/'.$v->offer_id)}}">{{$v->offer_title}}
                                ...<span><?php echo date('Y-m-d', strtotime($v->created_at))?></span></a></li>
                    @endforeach
                @endif
            </ul>
        </div>


    </div>
</div>
