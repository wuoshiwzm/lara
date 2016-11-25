
<div class="nav">
@foreach($navs as $k=>$v)
  <li>
      <a href="{{$v->nav_url}}">
        <p class="nav_top">{{$v->nav_alias}}</p>
        <p class="nav_bottom">{{$v->nav_name}}</p></a>
  </li>
@endforeach
</div>
