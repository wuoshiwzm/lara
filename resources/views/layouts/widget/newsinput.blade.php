<link href="{{asset('resources/views/home/css/bootstrap.min.css')}}" rel="stylesheet">
<div class="form-group">
    <label for="name">标题：</label>
    <input type="text" style="width:95.5%" class="form-control md" id="title" placeholder="请输入标题">
</div>

<label for="name">内容：</label>
<div class="kuang">
    <!-- <form id="drm" action="http://127.0.0.48:89/ZIMEITI/fb.php" method="post"> -->




    <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor0/ueditor.config.js')}}"></script>
    <script type="text/javascript" charset="utf-8"
            src="{{asset('resources/org/ueditor0/ueditor.all.min.js')}}"></script>


    <input type="hidden" name="action" value="add">
    <input type="hidden" name="post[join_type]" value="0">
    <input type="hidden" name="post[title]" value="的新鲜事">
    <script type="text/javascript">
        var ue = UE.getEditor('editor');
    </script>


    <script id="editor" type="text/plain" style="width:99.5%;height:150px;"></script>
    <div class="ku_bot">
        <div class="kb_submit">
            <i class="fa fa-thumbs-up"></i>


            <a class="button button-glow button-rounded button-caution" onclick="newsSubmit()">提交</a>
            <!-- <a  class="button button-glow button-border button-rounded button-primary">提交</a>
            <span class="button-wrap">
              <a  class="button button-pill button-raised button-primary" onclick="newsSubmit()">提交</a>
            </span> -->
            <!-- <button class="button button-primary button-box button-giant button-longshadow-right">
             <i class="fa fa-twitter"></i>
           </button> -->
            <!-- <input  type="submit" name="submit" value="发布" onclick="newsSubmit()"> -->
        </div>


        <tr>
            <th width="120">此推广对应有效区域：</th>
            <td>
                <div id="distpicker" data-toggle="distpicker">
                    <select name="area_add1" class="md" id="area_add1"></select>
                    <select name="area_add2" class="md" id="area_add2"></select>
                    <!-- <select name="area_add3"  class="md"></select> -->
                </div>
                <script src="{{asset('resources/org/ChinaAddress/js/distpicker.data.js')}}"></script>
                <script src="{{asset('resources/org/ChinaAddress/js/distpicker.js')}}"></script>
                <script src="{{asset('resources/org/ChinaAddress/js/main.js')}}"></script>
                <script>
                    $("#distpicker").distpicker({
                        province: "---- 请选择省 默认为全国 ----",
                        city: "---- 请选择市 默认为全省 ----",
                        district: "---- 请选择区 默认为全市 ----",
                        autoSelect: false
                    });
                </script>
            </td>
        </tr>


    </div>
    <!-- </form> -->

</div>


<script>

    function getContent() {
        var arr = [];
        arr.push("使用editor.getContent()方法可以获得编辑器的内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getContent());
        alert(arr.join("\n"));
    }


    function newsSubmit() {
        var arr;
        arr = UE.getEditor('editor').getContent();
        media_province = $("#area_add1").val();
        media_city = $("#area_add2").val();
        title = $("#title").val();

        $.post('{{url('/self_media/add')}}', {
            '_token': "{{csrf_token()}}",
            'content': arr,
            'media_province': media_province,
            'media_city': media_city,
            'title': title
        }, function (data) {

            //0 means user need to login
            //1 means the content is empty
            //2 means the balance is empty need to recharge
            //4 succeed and notice user that each twitte will charge him 1 currency
            if (data.status == 0) {
                layer.confirm(data.msg, {
                    btn: ['登录', '取消'] //按钮
                }, function () {
                    window.open("{{url('/member/login')}}");
                    layer.confirm('完成登录？', {
                        btn: ['完成', '取消'] //按钮
                    }, function () {
                        location.href = location.href;
                    });
                });
            } else if (data.status == 1) {

                layer.confirm(data.msg, {
                    btn: ['确认', '取消'] //按钮
                });


            } else if (data.status == 2) {
                layer.confirm(data.msg, {
                    btn: ['充值', '取消'] //按钮
                }, function () {

                });
            } else if (data.status == 4) {
                layer.confirm(data.msg, {
                            btn: ['确认', '取消'] //按钮
                        }, function () {
                            location.href = location.href;
                        }
                        , function () {
                            location.href = location.href;
                        });
            }

        });
    }

</script>
