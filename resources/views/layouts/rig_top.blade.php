<div class="rig_top">
  <!-- <h1>test</h1> -->
    <div class="city">
      欢迎你　


      @if(session('user'))
      <a href="{{url('admin')}}" target="_blank"> {{session('user')->user_name}}</a>
      @else
      <a href="{{url('admin')}}">　登录</a>
      @endif

       <span><a href="http://bq.com/api/city.php" style="color:#fff;">[ 切换城市：全国]</a></span></div>
    <div class="welocome">欢迎光临西安步旗广告传播有限公司网络平台!</div>
    <div class="data">
        <span id="info1">今天是：2016年9月11日</span>
        <script language="javascript" type="text/javascript">
            //js获取日期
            function time()
            {
              var now= new Date();
              var year=now.getFullYear();
              var month=now.getMonth();
              var date=now.getDate();
            //写入相应id
             document.getElementById("info1").innerHTML="今天是："+year+"年"+(month+1)+"月"+date+"日";
            }
        </script>
        <iframe width="450" scrolling="no" height="18" frameborder="0" allowtransparency="true" src="{{asset('resources/views/home/js/index.html')}}"></iframe>
    </div>
</div>
