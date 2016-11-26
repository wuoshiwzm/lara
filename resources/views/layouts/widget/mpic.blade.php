<div class="banner">
     <div id="full-screen-slidera">
        <ul id="slidesa">
          @foreach($mpic as $k=>$v)
              <li style="background:url({{$v->mpic_path}}) no-repeat center">
                <a ></a>
              </li>
          @endforeach
        </ul>
     </div>
</div>
