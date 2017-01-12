<div class="box1_right">
    <div class="TabTitle">
        <ul>
            <li class="hover" id="gsjj1" onMouseover="setTab('gsjj',1,2)"><a href="#">会员登录</a></li>
            <!-- <li class="" id="gsjj2" onMouseover="setTab('gsjj',2,2)"><a href="#">企业登录</a></li> -->
        </ul>
        <div class="clear"></div>
    </div>
    <div class="Tabbottom">
            <div  class="display" style="display: block;">
                    @if(session('user'))
                      <p class="we_name">
                          欢迎回来,<a href="{{url('member')}}" target="_blank">{{session('user')->user_name}} </a>！<span class="tuichu">
                            <a href="{{url('member/quit')}}">[退出]</span></a>
                      </p>
                      <p class="we_name awe">
                      <!-- <span class="toudi">投递反馈(0)<br>消息中心(3/5)</span>
                      <span>信息管理<br>信息管理<br>信息管理</span> -->
                      <span style="width:100% !important;">动动手指头，轻轻松松赚钱花！</span>
                      </p>
                      <a href="{{url('member')}}" target="_blank"><input type="button" class="denglu" value="进入个人中心"></a>
                    @else
                      <input type="text" class="input_aa" placeholder="用户名" id="user_name" name="user_name">
                      <input type="password" class="input_aa" placeholder="密码" id="user_pass"name="user_pass">
                      <input type="text" class="input_ab" placeholder="验证码" id="code" name="code">
                      <img src="{{url('admin/code')}}" alt="" onclick="this.src='{{url('admin/code')}}?'+Math.random()" class="valid_code">

                      <input type="button" class="denglu" id="login" value="确认登录">
                      <p class="zhu">还没有注册账号？ <a href="{{url('register')}}" target="_blank">立即注册</a><a href="{{url('forgotpass')}}" target="_blank" style="float:right;margin-right: 10px;">忘记密码？</a></p>
                    @endif

              </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">

$(function(){
$("#login").bind("click",function(){
var user_name = $("#user_name").val();
var user_pass = $("#user_pass").val();
var code = $("#code").val();

$.post('member/ajax_login',{'_token':"{{csrf_token()}}",'user_name':user_name,'user_pass':user_pass,'code':code},function(data){

//登录失败

if(data.status==0){

  alert(data.msg);

  // layer.msg(data.msg, {icon: 2});
}
//登录成功
if(data.status==1){
  // layer.msg(data.msg, {icon: 1});
  alert(data.msg);
  location.href = location.href;
}

});
});
});
</script>
