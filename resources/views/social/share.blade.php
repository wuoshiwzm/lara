<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
  </head>


  <body>
    <h1>点击右上角分享吧！</h1>

    <!-- @if($status==0) -->
    <div>
    <!-- already sign in -->
    <!-- <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script> -->
    <script>
    alert("login already!");

      wx.config({
          debug: true, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
          appId: 'wx260619ea73a4b130',     // 必填，公众号的唯一标识
          timestamp: {{$wechat['timestamp']}}, // 必填，生成签名的时间戳
          nonceStr:  "{{$wechat['noncestr']}}", // 必填，生成签名的随机串
          signature: "{{$wechat['signature']}}",// 必填，签名，见附录1
          jsApiList: ['checkJsApi','onMenuShareTimeline','onMenuShareAppMessage'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
      });

      wx.ready(function(){

        wx.onMenuShareTimeline({
            title: 'testtitle', // 分享标题
            link: 'adbangbang.com', // 分享链接
            imgUrl: '', // 分享图标
            success: function () {
                alert(1111);// 用户确认分享后执行的回调函数
            },
            cancel: function () {
              alert(222);  // 用户取消分享后执行的回调函数
            }
        });



         // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在页面加载时就调用相
         //关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready函数中。
      });



      wx.error(function(res){

        alert("failed!");
    // config信息验证失败会执行error函数，如签名过期导致验证失败，具体错误信息可以打开config的debug模式查看，也可以在返回的res参数中查看，对于SPA可以在这里更新签名。
    });


    </script>
    </div>
    <hr>

    <!-- @elseif($status == 1) -->
    <!-- not sign in please <a href="{{url('admin/login')}}" target="_blank">sing in</a> first!

    <a href="javascript:history.go(0);">already login refresh</a> -->

    <!-- @endif -->


    <!-- share content -->
    <div>
    </div>
  </body>
</html>
