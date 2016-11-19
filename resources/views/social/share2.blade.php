<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="{{url('resources/views/social/style.css')}}">
    <style media="screen">
      .visible-print text-center{
        text-align: center;
      }
    </style>
  </head>
  <body>
<!-- link to adbangbang.com/share -->

<!-- get the id of the self_media  -->

<!-- generate qr -->
<div class="visible-print text-center">

    {!! QrCode::size(450)->generate('adbangbang.com/share/'.$media_id); !!}
    <p>扫描上方二维码，分享得红包啦!</p>
</div>



  </body>
</html>
