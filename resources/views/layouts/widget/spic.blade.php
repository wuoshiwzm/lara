<div class="box1_midden">
        <div id="slide-holder">
            <div id="slide-runner">
                @foreach($spic as $k=>$v)
                <a href="#" target="_blank"><img id="slide-img-{{$k+1}}" src="{{$v->spic_path}}" class="slide" alt="" /></a>
                @endforeach


                <div id="slide-controls">
                    <p id="slide-client" class="text"><strong></strong><span></span></p>
                    <p id="slide-desc" class="text"></p>
                    <p id="slide-nav"></p>
                </div>
            </div>
        </div>
            <script type="text/javascript">
                if(!window.slider) {
                    var slider={};
                }
                slider.data= [

                  @foreach($spic as $k=>$v)
                  {
                      "id":"slide-img-{{$k+1}}", // 与slide-runner中的img标签id对应
                      "client":"",
                       "desc":"" //这里修改描述
                  },
                  @endforeach

                ];
            </script>
  </div>
