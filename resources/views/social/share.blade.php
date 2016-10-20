<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    @if($status==0)
    <div>
    <!-- already sign in -->
    </div>
    <hr>
    <!-- <div>
    <span style="float:right;">
      JiaThis Button BEGIN
          <script "text/javascript">
          var jiathis_config = {
            url: "http://www.yourdomain.com",
            title: "自定义网页标题 #话题#",
            summary:"分享的文本摘要"
          }
          </script>
          <span id="ckepop">
          <span class="jiathis_txt">分享到：</span>

          <a class="jiathis_button_weixin">微信分享</a>
          <a class="jiathis_button_tsina">新浪微博</a>
          <a class="jiathis_button_douban"></a>
          <a class="jiathis_button_qzone" >QQ空间</a>
          <a class="jiathis_button_tools_1"></a>
          <a class="jiathis_button_tools_2"></a>

          </span>
          <script type="text/javascript" src="http://v2.jiathis.com/code/jia.js" charset="utf-8"></script>
          JiaThis Button END
        </span>
      </div> -->

      

    @elseif($status == 1)
    not sign in please <a href="{{url('admin/login')}}" target="_blank">sing in</a> first!

    <a href="javascript:history.go(0);">already login refresh</a>

    @endif


    <!-- share content -->
    <div>
    </div>
  </body>
</html>
