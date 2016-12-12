@extends('layouts.wap.index')

@section('title')
    全民推手
@stop

{{--格式显示 传过来的内容--}}


@section('content')
    <script>
        $.post("{{url('wap/self_media/get_content')}}",
                {
                    '_token': "{{csrf_token()}}",
                }, function (data) {
                    //得到内容的JSON 字符串，解析并显示

                    //解析 json字符串
                    var data = $.parseJSON(data);
//                    alert(data);
                    $.each(data, function (n, value) {

                        //alert(value['content']);
                        //clear the select options then add the new info
                        $(".wide-item-wrapper").append(
                                "<div class='wide-item-titles'>"
                                + "<h4>"
                                + "分享送红包！"
                                + "</h4>"
                                + "</div>"
                                +"<p>"
                                +'</div>'
                                +"<div class='wide-image'>"
                                +"<div class='overlay'></div>"
                                +"<a class='tile-wide' href='self_media'>"//点击进入对应的文章页面
                                +"<img class='responsive-image'"
                                +"src="
                                +"{{asset('resources/views/wap/images/general-nature/1w.jpg')}}"
                                +" alt='img'></a>"
                                +"</div>"
                        );
                    });

//                    alert('test');
                });

    </script>



    {{--循环体--}}
    {{--<div class="wide-item-titles">--}}
        {{--<h4>I do nothing!</h4>--}}
        {{--<p>You can add as many images as you want!</p>--}}
    {{--</div>--}}
    {{--<div class="wide-image">--}}
        {{--<div class="overlay"></div>--}}
        {{--<a class="tile-wide" href="#">--}}
            {{--<img class="responsive-image"--}}
                 {{--src="{{asset('resources/views/wap/images/general-nature/1w.jpg')}}"--}}
                 {{--alt="img"></a>--}}
    {{--</div>--}}


    {{--@include('layouts/wap/self_media_show_js')--}}

@stop