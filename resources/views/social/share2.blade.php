<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="{{url('resources/views/social/style.css')}}">
  </head>
  <body>
<!-- link to adbangbang.com/share -->

<!-- get the id of the self_media  -->

<!-- generate qr -->
<div class="visible-print text-center">

    {!! QrCode::size(500)->generate('adbangbang.com/share/'.$media_id); !!}
    <p>Scan me to return to the original page.</p>
</div>

    <img src="{{asset('resources/views/social/share.png')}}">


  </body>
</html>
