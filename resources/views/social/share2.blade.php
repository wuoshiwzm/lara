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

<?php die(); ?>
<?php
  $uri = 'http://adbangbang.com/share/'.$media_id;
 ?>
<!-- generate qr -->
<div class="visible-print text-center">
    {!!QrCode::size(450)->generate($uri); !!}
    <p>扫描上方二维码，分享得红包啦!</p>
</div>



  </body>
</html>
