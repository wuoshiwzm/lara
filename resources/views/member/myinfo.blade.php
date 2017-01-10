<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('resources/views/member/style/css/reset.css')}}" />
    <link rel="stylesheet" href="{{asset('resources/views/member/style/css/style.css')}}" />
    <script type="text/javascript" src="{{asset('resources/views/member/style/js/jquery.js')}}" ></script>
    <script type="text/javascript" src="{{asset('resources/views/member/style/js/easing.js')}}" ></script>
    <title>个人资料</title>
    <style>
        /*右边内容区域*/
        .main_right { background: #fff;  font-size: 14px; padding: 5px;}
        .main_right h2 {font-size: 18px;background: #F0F0F0; color: #ff7200; padding: 10px;}
        #bianji {color: #4a90e3; padding: 5px;}
        .txt-impt {color: red; margin-right: 5px;}
        .td2 input{width: 287px; height: 30px;}
        .int {border: none; outline: none;}
        .main_right img {width: 100%; height: 100%;}
        .main_right table tr td {height: 44px; line-height: 44px;}
        .main_right table td:first-child{padding-right: 10px; text-align:right }
        .btn {display: none; margin:20px 90px;}
        .btn input { margin-right: 10px; padding: 6px 40px; background: #ff7200; border: none; border-radius: 5px; text-align: center; color: #fff;}
        .tx{display: block; width: 80px;  height:80px; border-radius: 50%; overflow: hidden; background-image: url({{asset('resources/views/member/style/images/logo.jpg')}});}
        .bjtx {width: 80px;  height:80px; border-radius: 50%; display: none; }
        .bjtx {background: #000; color: #fff; position: absolute; top: 78px; text-align: center; opacity:0.7;filter:alpha(opacity=70);}
    </style>
    <link rel="stylesheet" href="{{asset('resources/org/bianjitoux/css/style.css')}}" />
    <script type="text/javascript" src="{{asset('resources/org/bianjitoux/js/cropbox.js')}}" ></script>
</head>
<body>
    <div class="main_right">
        <div><h2>个人资料</h2><p id="bianji">编辑设置</p></div>
        <input type="hidden" id="isediting" value="0" />
        <form id="form1" action="{{url('member/editmyinfo')}}" method="get" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>个人头像</td>
                    <td><a class="tx">
                        @if($userinfo['headimg'])
                            <img id="cropped" src="{{$userinfo['headimg']}}" />
                        @else
                            <img id="cropped" src="{{asset('resources/views/member/style/images/touxiang.jpg')}}" />
                        @endif
                            <input type="hidden" id="myheaderimg" name="myheaderimg" value="{{$userinfo['headimg']}}" />
                        </a>
                        <a href="javascript:showtxbianji();"class="bjtx">编辑头像</a>
                        <div id="cutimg" style="display:none;">
                            <div class="imageBox">
                                <div class="thumbBox"></div>
                                <div class="spinner" style="display: none">Loading...</div>
                            </div>
                            <div class="action"> 
                                <div class="new-contentarea tc"> 
                                    <a href="javascript:void(0)" class="upload-img">
                                        <label for="upload-file">上传图像</label>
                                    </a>
                                    <input type="file" class="" name="upload-file" id="upload-file" />
                                </div>
                                <input type="button" id="btnCrop"  class="Btnsty_peyton" value="裁切">
                                <input type="button" id="btnZoomIn" class="Btnsty_peyton" value="+"  >
                                <input type="button" id="btnZoomOut" class="Btnsty_peyton" value="-" >
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><span class="txt-impt">*</span>用户名：</td>
                    <td class="td2">
                        <div>
                            <!-- <input type="text" name="username" readonly="readonly" class="int" value="{{$userinfo['user_name']}}"/> -->
                            <span>{{$userinfo['user_name']}}</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><span class="txt-impt">*</span>昵称：</td>
                    <td  class="td2"><input type="text" name="fname" readonly="readonly" class="int" value="{{$userinfo['nickname']}}"/></td>
                </tr>
                <!--<tr>
                    <td>性别：</td>
                    <td>
                        <input type="radio" name="Sex" readonly="readonly" name="sex"/>男
                        <input type="radio" name="Sex" readonly="readonly" name="sex"/>女
                        <input type="radio" name="Sex" readonly="readonly" name="sex"/>保密
                    </td>
                </tr>-->
                <!-- <tr>
                    <td>生日：</td>
                    <td class="td2"> <input type="text" readonly="readonly" class="int" value="2016年3月9日"/>
                    </td>
                </tr>
                <tr>
                    <td>电话：</td>
                    <td  class="td2"><input type="text" name="tel" readonly="readonly" class="int" value="029-85210000"/></td>
                </tr> -->
                <tr>
                    <td><span class="txt-impt">*</span>手机：</td>
                    <td  class="td2"><input type="text" name="phone" readonly="readonly" class="int" value="{{$userinfo['cellphone']}}"/></td>
                </tr>
                <tr>
                    <td><span class="txt-impt">*</span>邮箱：</td>
                    <td  class="td2">
                        @if($userinfo['user_emailhead'])
                        <input type="text" name="email" readonly="readonly" class="int" value="{{$userinfo['user_emailhead'].'@'.$userinfo['user_emailbody'].'.'.$userinfo['user_emailtail']}}"/>
                        @else
                        <input type="text" name="email" readonly="readonly" class="int" value=""/>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td><span class="txt-impt">*</span>地址：</td>
                    <td  class="td2"><input type="text" name="addr" readonly="readonly" class="int" value="{{$userinfo['address']}}"/></td>
                </tr>
            </table>
            <div class="btn">
                <input type="button" id="queding" onclick="Check();" value="确定" />
                <input type="reset" id="quxiao" value="取消" />
            </div>
        </form>
    </div>

    <script>
        $("#bianji").click( function(){
            $(".btn").show();
            $("input").removeAttr("readonly").removeClass("int").focus();
            $("#isediting").val(1);
        })
        
        $("#quxiao").click( function(){
            $("input").attr("readonly","readonly").addClass("int");
            $("#isediting").val(0);
            $(".btn").hide();
        })
    </script>
    <script>
        function showtxbianji()
        {
            $("#cutimg").show();
        }
        function hidetxbianji()
        {
            $("#cutimg").hide();
        }
        function Check(){
            var fname =document.all("fname").value;
            var phone =document.all("phone").value;
            var email = document.all("email").value;
            var addr = document.all("addr").value;
            if(fname==""||fname==null){
            alert("昵称不能为空");
            document.all("fname").select();
            return false;
            }
            if(phone==""||phone==null){
            alert("手机号码不能为空");
            document.all("phone").select();
            return false;
            }
            var phonepattern = /^1[34578]\d{9}$/;
            if(!phonepattern.test(phone))
            {
            alert("请输入正确的手机号");
            document.all("phone").select();
            return false;
            }
            if(email==""||email==null){
            alert("邮箱不能为空");
            document.all("email").select();
            return false;
            }
            var emailpattern = /^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/;
            if(!emailpattern.test(email))
            {
            alert("请输入正确的邮箱地址");
            document.all("email").select();
            return false;
            }
            if(addr==""||addr==null){
            alert("所在地不能为空");
            document.all("addr").focus();
            return false;
            }
            $("form").submit();
            return true;
        }
    </script>
    
    <script>
    //等待dom元素加载完毕.
        $(function(){
            $(".treebox .level1>a").click(function(){
                $(this).addClass('current')   //给当前元素添加"current"样式
                .find('i').addClass('down')   //小箭头向下样式
                .parent().next().slideDown('slow','easeOutQuad')  //下一个元素显示
                .parent().siblings().children('a').removeClass('current')//父元素的兄弟元素的子元素去除"current"样式
                .find('i').removeClass('down').parent().next().slideUp('slow','easeOutQuad');//隐藏
                 return false; //阻止默认时间
            });
        })
    </script>
    <script>
        $(document).ready(function(){
          $(".tx").mouseover(function(){
            if($("#isediting").val() == '1')
            {
                $(".bjtx").show();
            }
          });
          $(".bjtx").mouseout(function(){
            $(".bjtx").hide();
          });
        });

        var options =
        {
            thumbBox: '.thumbBox',
            spinner: '.spinner',
            imgSrc: '{{asset('resources/views/member/style/images/touxiang.jpg')}}'
        }
        var cropper = $('.imageBox').cropbox(options);
        $('#upload-file').on('change', function(){
            var reader = new FileReader();
            reader.onload = function(e) {
                options.imgSrc = e.target.result;
                cropper = $('.imageBox').cropbox(options);
            }
            reader.readAsDataURL(this.files[0]);
            this.files = [];
        })
        $('#btnCrop').on('click', function(){
            var img = cropper.getDataURL();
            $("#cropped").attr("src", img);
            $.ajax({
                type: 'post',
                url: '{{url('member/ajaxuploadheader')}}',
                async: false,
                data:'imgdata='+img+'&_token={{csrf_token()}}',
                dataType: "text",
                success: function(r){
                    $("#myheaderimg").val(r);
                    hidetxbianji();
                }
            });
        })
        $('#btnZoomIn').on('click', function(){
            cropper.zoomIn();
        })
        $('#btnZoomOut').on('click', function(){
            cropper.zoomOut();
        })
    </script>
</body>
<html>