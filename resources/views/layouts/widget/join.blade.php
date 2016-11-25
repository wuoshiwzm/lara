<div class="box1">
        <div class="box1_m">
            <div class="box1_left">
                <ul>
                  @foreach($company as $k=>$v)
                  <li> <a href="">欢迎{{$v->company_name}}入驻本平台</a> </li>
                  @endforeach
                </ul>
            </div>
