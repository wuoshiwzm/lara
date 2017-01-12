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
.btn-disabled {
    color: #c1c1c1 !important;
    background: #fd4c5a !important;
    cursor: default !important;
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
        忘记密码
    </div>
    <div class="zw">
        <div class="tex">

            <div class="forgotpass-con">
                <div class="forgot-item"><input type="text" class="forgot-input" id="uname" placeholder="请输入用户名" /></div>
                <div class="forgot-item"><input type="button" class="forgot-btn" value="验证用户身份" onclick="verifyIdentity()" /></div>
            </div>
            <script>
                function verifyIdentity()
                {
                    $(".forgot-btn").attr("disabled","disabled");
                    $(".forgot-btn").addClass("btn-disabled");
                    var uname = $("#uname").val();
                    if(!uname)
                    {
                        alert("请输入您的用户名");
                        $("#uname").focus();
                        return false;
                    }
                    $.ajax({
                        type: 'get',
                        url: '{{url('verifyuser')}}',
                        anyce: false,
                        dataType: 'JSON',
                        data: 'uname='+uname,
                        success: function(r){
                            if(r.code)
                            {
                                //成功
                                alert(r.msg);
                                return true;
                            }
                            else
                            {
                                alert(r.msg);
                                $(".forgot-btn").removeAttr("disabled");
                                $(".forgot-btn").removeClass("btn-disabled");
                                return false;
                            }
                        },
                        error: function(){
                            alert('系统错误，请稍后再试');
                            $(".forgot-btn").removeAttr("disabled");
                            $(".forgot-btn").removeClass("btn-disabled");
                            return false;
                        }
                    });
                }
            </script>

        </div>
    </div>
</div>


@include('layouts.footer')


</body></html>
