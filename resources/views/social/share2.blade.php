<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      .visible-print text-center{
      }
    </style>
  </head>
  <body>
<!-- link to adbangbang.com/share -->

<!-- get the id of the self_media  -->




<?php
  $uri = 'http://adbangbang.com//wap/self_media/'.$media_id;
 ?>
<!-- generate qr -->
<div class="visible-print text-center">

    {!!QrCode::size(450)->generate($uri) !!}
    <p>扫描上方二维码，分享并领取专属红包!<img src="{{asset('resources/views/home/images/logo.jpg')}}"></p>

</div>



  </body>
</html>
