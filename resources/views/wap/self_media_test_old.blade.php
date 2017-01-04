@extends('layouts.wap.index')

@section('title')
    全民推手
@stop

{{--格式显示 传过来的内容--}}


@section('content')

    {{--菜单--}}
    <div class="content">
        <div class="header">
            <a href="#" class="homepage-logo">
                <img src="{{asset('resources/views/wap/images/misc/logo.png')}}" alt="img">
            </a>
            <a href="#" class="go-home">HOME</a>
            <a href="#" class="go-menu">MENU</a>
            <a href="#" class="go-back">CLOSE</a>
        </div>
        <div class="decoration"></div>

        <div class="navigation">
            <div class="corner-deco"></div>
            <div class="navigation-wrapper">
                <div class="navigation-item">
                    <a href="index.html" class="home-icon">Homepage</a>
                    <em class="inactive-menu"></em>
                </div>
                <div class="navigation-item">
                    <a href="#" class="features-icon has-submenu">Features</a>
                    <em class="dropdown-menu"></em>
                    <div class="submenu">
                        <a href="type.html">Typography		 <em></em></a>
                        <a href="jquery.html">jQuery		   <em></em></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>

        $.post("{{url('wap/self_media/get_content')}}",
                {

                    '_token': "{{csrf_token()}}",

                }, function (data) {
                    //得到内容的JSON 字符串，解析并显示

                    //解析 json字符串
                    var data = $.parseJSON(data);
                    $.each(data, function (n, value) {


                        //alert(value['content']);
                        //clear the select options then add the new info
                        $(".wide-item-wrapper").append(
                                "<div class='wide-item-titles'>"
                                + "<h4>"
                                + value['title'].substr(0,12)
                                + "..."
                                + " - "
                                + value['user_name']
                                + "</h4>"
                                + "<h4>"
                                + "已分享送出红包"
                                + value['share_time']
                                + "  次"
                                + "</h4>"
                                + "</div>"
                                + "<p>"
                                + '</div>'
                                + "<div class='wide-image'>"
                                + "<div class='overlay'></div>"
                                + "<a class='tile-wide' href='/wap/self_media/" + value['media_id'] + "'>"//点击进入对应的文章页面
                                + "<img class='responsive-image'"
                                + "src="
                                + "/resources/views/wap/images/general-nature/" + Math.round(Math.random() * 5 + 1) + "w.jpg"
                                {{--                                            + "{{asset('resources/views/wap/images/general-nature/1w.jpg')}}"--}}
                                + " alt='img'></a>"
                                + "</div>"
                        );
                    });

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