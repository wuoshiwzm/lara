<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script>

    </script>
    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script src="{{asset('resources/views/home/js/jquery.js')}}"></script>
    <title>Document</title>
</head>
<body>

{{--格式显示 传过来的内容--}}
<div class="content">

</div>

<form action="">


</form>


<script>

    $.post("{{url('wap/self_media/get_content')}}",
            {
                '_token': "{{csrf_token()}}",


            }, function (data) {
                //得到内容的JSON 字符串，解析并显示

                //解析 json字符串
                var data = $.parseJSON(data);
                alert(data);
                $.each(data, function (n, value) {

//                    alert(value['content']);
                    //clear the select options then add the new info
                    $(".content").append("<div >" + value["content"] + "</div>");
                });

//                alert(data);
            });

</script>


{{--@include('layouts/wap/self_media_show_js')--}}

</body>
</html>