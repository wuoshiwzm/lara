<div class="box_2">
        <div class="title_box_2"></div>
        <div class="piczs">
            <div class="rollBoxa">
                <div class="Cont">
                    <div class="ScrCont">
                            <div>
                                    <ul>
                                      @foreach($main_media as $k=>$v)
                                          <li>
                                             <a href="{{$v->main_media_url}}"><img src="{{asset('resources/views/home/images/m8.png')}}"></a>
                                               <p class="topaa">{{$v->main_media_name}}</p>
                                               <p class="topbb">{{$v->main_media_en}}</p>
                                          </li>
                                      @endforeach
                                    </ul>
                            </div>
                                <div class="clear"></div>
                         </div>
                     <div class="clear"></div>
            </div>
      </div>
      <div class="clear"></div>
</div>
</div>
