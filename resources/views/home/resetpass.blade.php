@include('layouts.header')
<!-- 文章内容 - 广告资源 -->

<body onload="time()">
<!-- data for weixin share -->
<style>
.forgotpass-con {
    margin: 30px 0;
    text-align: center;
}
.forgot-item {
    margin: 20px 0;
}
.forgot-input {
    display: inline-block;
    width: 500px;
    height: 40px;
    padding: 0 10px;
    font-size: 16px;
    border: 2px solid #e70012;
    color: #b5b5b5;
    text-align: left;
}
.forgot-btn {
    width: 300px;
    height: 50px;
    font-size: 18px;
    font-weight: 700;
    color: #fff;
    background: #e70012;
    cursor: pointer;
}
</style>

<input type="hidden" class="session_user" value=
@if( session('user'))
        "{{session('user')->user_name}}"
@else
    ""
@endif >
<div class="top">
    <div class="wrappersy">
        <div class="logo">
            <a href=" {{url('/')}}"><img src="{{asset('resources/views/home/images/logo.jpg')}}"></a>
        </div>
        <div class="top_right">
            <!-- weather date ... -->
        @include('layouts.rig_top')

        <!-- nav bar -->
        @include('layouts.nav')

        <!-- seach bar -->
            @include('layouts.search')


        </div>
    </div>
</div>

<!-- 内容部分 -->

<div class="xiangqing">
    <div class="ny_top">当前位置：
        <a href="{{url('/')}}">首页</a> >
        重置密码
    </div>
    <div class="zw">
        <div class="tex">

            <div class="forgotpass-con">
                <input type="hidden" id="code" value="{{$flagcode}}" />
                <div class="forgot-item"><input type="text" class="forgot-input" id="uname" placeholder="请输入用户名" /></div>
                <div class="forgot-item"><input type="password" class="forgot-input" id="newpass" placeholder="请输入新密码，6~16个字符，区分大小写" /></div>
                <div class="forgot-item"><input type="password" class="forgot-input" id="newpass2" placeholder="请再次输入新密码，6~16个字符，区分大小写" /></div>
                <div class="forgot-item"><input type="button" class="forgot-btn" value="重置密码" onclick="resetpass()" /></div>
            </div>
            <script>
                function resetpass()
                {
                    var code = $("#code").val();
                    var uname = $("#uname").val();
                    var newpass = $("#newpass").val();
                    var newpass2 = $("#newpass2").val();
                    if(!uname)
                    {
                        alert("请输入您的用户名");
                        $("#uname").focus();
                        return false;
                    }
                    if(!newpass)
                    {
                        alert("请输入新密码");
                        $("#newpass").focus();
                        return false;
                    }
                    if(newpass.length < 6 || newpass.length > 16 || /^{\w}*$/.test(newpass))
                    {
                        alert("请输入符合要求的密码");
                        $("#newpass").focus();
                        return false;
                    }
                    if(!newpass2)
                    {
                        alert("请再次输入新密码");
                        $("#newpass2").focus();
                        return false;
                    }
                    if(newpass2 != newpass)
                    {
                        alert("两次输入的密码不一致");
                        $("#newpass2").focus();
                        return false;
                    }
                    $.ajax({
                        type: 'get',
                        url: '{{url('ajaxresetpass')}}',
                        anyce: false,
                        dataType: 'JSON',
                        data: 'uname='+uname+'&pass='+newpass+'&code='+code,
                        success: function(r){
                            if(r.code)
                            {
                                //成功
                                alert(r.msg);
                                window.location.href="{{url('/')}}";
                                return true;
                            }
                            else
                            {
                                alert(r.msg);
                                return false;
                            }
                        },
                        error: function(){
                            alert('系统错误，请稍后再试');
                            return false;
                        }
                    });
                }
                $(document).ready(function(){
                    var code = $("#code").val();
                    var uname = $("#uname").val();
                    var newpass = $("#newpass").val();
                    var newpass2 = $("#newpass2").val();
                    if(!code)
                    {
                        window.location.href="{{url('/')}}";
                        return false;
                    }
                });
            </script>

        </div>
    </div>
</div>


@include('layouts.footer')


</body></html>
