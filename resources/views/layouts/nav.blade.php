
<div class="nav">
@foreach($navs as $k=>$v)
  <li>
      <a href="{{$v->nav_url}}">
        <p class="nav_top">{{$v->nav_alias}}</p>
        <p class="nav_bottom">{{$v->nav_name}}</p></a>
  </li>
@endforeach
</div>

<!--
<div class="nav">
    <li>
        <a href="http://bq.com/"><p class="nav_top">SHOUYE</p><p class="nav_bottom">网站首页</p></a>
    </li>
     <li class="select">
        <a href="http://bq.com/sell/list.php?catid=216"><p class="nav_top">GUANGGAO</p><p class="nav_bottom">广告媒体</p></a>
    </li>
    <li>
        <a href="http://bq.com/sell/list.php?catid=217"><p class="nav_top">SHEJI</p><p class="nav_bottom">创意设计</p></a>
    </li>
    <li>
        <a href="http://bq.com/sell/list.php?catid=218"><p class="nav_top">CEHUA</p> <p class="nav_bottom">活动策划</p></a>
    </li>
    <li>
        <a href="http://bq.com/ZIMEITI/"><p class="nav_top">ZIMEITI</p><p class="nav_bottom">自媒体</p></a>
    </li>
    <li>
        <a href="http://127.0.0.48:89/ZHAOBIAO/"><p class="nav_top">ZHAOBIAO</p><p class="nav_bottom">热门招标</p></a>
    </li>
    <li>
        <a href="http://bq.com/invest/list.php?catid=204"><p class="nav_top">PENGYOU</p><p class="nav_bottom">招商中心</p></a>
    </li>

    <li>
        <a href="http://bq.com/news/list.php?catid=203"><p class="nav_top">BAIKEZILIAO</p><p class="nav_bottom">百科资料</p></a>
    </li>
</div> -->
