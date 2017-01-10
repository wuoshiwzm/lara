<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <!--[if IE]>
		<script src="http://libs.useso.com/js/html5shiv/3.7/html5shiv.min.js"></script>
	<![endif]-->
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('resources/views/member/style/css/reset.css')}}" />
    <link rel="stylesheet" href="{{asset('resources/views/member/style/css/style.css')}}" />
    <script type="text/javascript" src="{{asset('resources/views/member/style/js/jquery.js')}}" ></script>
    <script type="text/javascript" src="{{asset('resources/views/member/style/js/easing.js')}}" ></script>
    <style>
        html {height:100%; overflow:hidden;}
        body {height: 100%;}
        /*右边内容区域*/
        .main_right { height:100%;margin-left: 196px;  background: #fff;  font-size: 14px; padding: 5px;}
        .main_right h2 {font-size: 18px;background: #F0F0F0; color: #ff7200; padding: 10px;}
        #bianji {color: #4a90e3; padding: 5px;}
        .txt-impt {color: red; margin-right: 5px;}
        .td2 input{width: 287px; height: 30px;}
        .int {border: none; outline: none;}
        .main_right img {width: 100%; height: 100%;}
        .main_right table tr td {height: 44px; line-height: 44px;}
        .main_right table td:first-child{padding-right: 10px; text-align:right }
        .btn {display: none; margin:20px 90px;}
        .btn input { margin-right: 10px; padding: 6px 40px; background: #ff7200; border: none; border-radius: 5px; text-align: center; color: #fff;}
        .tx{display: block; width: 80px;  height:80px; border-radius: 50%; overflow: hidden; background-image: url({{asset('resources/views/member/style/images/logo.jpg')}});}
        .bjtx {width: 80px;  height:80px; border-radius: 50%; display: none; }
        .bjtx {background: #000; color: #fff; position: absolute; top: 78px; text-align: center; opacity:0.7;filter:alpha(opacity=70);}
    </style>
</head>
<body>
  <!--[if lt IE 8]>
	    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	  <![endif]-->


@yield('content')

</body>
</html>
