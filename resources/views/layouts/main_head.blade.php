<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>首页</title>
<link rel="stylesheet" media="screen" href="{{asset('resources/views/home/css/style.css')}}" />
<link rel="stylesheet" media="screen" href="{{asset('resources/views/home/css/jquery.jslides.css')}}" />

<script type="text/javascript" src="{{asset('resources/views/home/js/jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/views/home/js/jquery.jslides.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/views/home/js/link.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/views/home/js/script.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/org/layer/layer.js')}}"></script>
</head>

<body>

<?php
  //dd(session('user'));
?>
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
