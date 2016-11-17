///富文本编辑
KindEditor.ready(function (K) {
    editor = K.create('textarea[name="txtContent"]', {
        resizeType: 1,
        allowPreviewEmoticons: false,
        allowImageUpload: false,
        items: [
                    'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                    'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                    'insertunorderedlist', '|', 'emoticons', 'link'],
        afterBlur: function () { this.sync(); }
    });
});

var start = {
    elem: '#bmkssj',
    format: 'YYYY/MM/DD hh:mm',
    //max: laydate.now(+3), //最大日期
    istime: true,
    festival: true,
    choose: function (datas) {
        end.min = datas; //开始日选好后，重置结束日的最小日期
        end.start = datas //将结束日的初始值设定为开始日
    }
};
var end = {
    elem: '#bmjzsj',
    format: 'YYYY/MM/DD hh:mm',
    max: laydate.now(+365), //最大日期
    istime: true,
    festival: true,
    choose: function (datas) {
        gssj.min = datas; //开始日选好后，重置结束日的最小日期
        gssj.start = datas //将结束日的初始值设定为开始日
        tbjz.min = datas; //开始日选好后，重置结束日的最小日期
        tbjz.start = datas //将结束日的初始值设定为开始日
    }
};
var gssj = {
    elem: '#gsjgsj',
    format: 'YYYY/MM/DD hh:mm',
    max: laydate.now(+365), //最大日期
    istime: true,
    festival: true
};
var tbjz = {
    elem: '#tbjzsj',
    format: 'YYYY/MM/DD hh:mm',
    max: laydate.now(+365), //最大日期
    istime: true,
    festival: true
};
$(".bmks").on("click", function () {
    laydate(start);
})
$(".bmjz").on("click", function () {
    laydate(end);
})
$(".jiezhi").on("click", function () {
    laydate(tbjz);
})
$(".jieguo").on("click", function () {
    laydate(gssj);
})

///日期显示
function DateSow_max(bid, days) {
    laydate({
        elem: bid,
        format: 'YYYY/MM/DD hh:mm',
        max: laydate.now(+days), //最大日期
        istime: true,
        festival: true
    });
}
///日期显示
function DateSow(bid) {
    laydate({
        elem: bid,
        format: 'YYYY/MM/DD hh:mm',
        max: '2099-06-16 23:59:59', //最大日期
        istime: true,
        festival: true
    });
}
///是否同意条款
$("#ydxy").change(function () {
    if ($("#ydxy:checked").length > 0) {
        $(".dianji").css("background", "#3584f3");
        $("#btn_sub").attr("onclick", "return subform();");
    }
    else {
        $(".dianji").css("background", "#ccc");
        $("#btn_sub").attr("onclick", "return false;");
    }
})

//验证方法
var isvc = {
    //ID变量
    vid: '',
    //长度
    len: 4,
    //是否为空
    isempty: function () {
        if ($("#" + this.vid).val() != "" && $("#" + this.vid).attr("placeholder") != $("#" + this.vid).val())
            return true;
        else
            return false;
    },
    //是否够长度
    islength: function () {
        if ($("#" + this.vid).val().length >= this.len)
            return true;
        else
            return false;
    },
    //公司名称
    iscompanyName: function () {
        var s = $("#" + this.vid).val();
        var str_key = "办事处,公司,小学,中学,学校,中心,局,银行,分行,社,总队,处,电站,院,酒店,矿,政府,所,部,协会,厂,场,集团,馆,行,会,署,网";
        var key = str_key.split(",");
        var r = 0;
        for (var i = 0; i < str_key.length; i++) {
            if (s.indexOf(key[i]) > -1) {
                return true;
            }
        }
        return false;
    },
    ///是否是手机号
    isphoneno: function () {
        var pre = /(^1[3|5|8][0-9]{9}$)/;
        return pre.test($("#" + this.vid).val());
    },
    ///弹出右边边tips
    alerttip: function (msg) {
        layer.tips(msg, $("#" + this.vid), { style: ['background-color:#4595e6;font-weight: 700;font-family:微软雅黑; color:#FFF!important', '#4595e6'], guide: 1, time: 4 });
    },
    ///弹出下方tips
    alerttipbottom: function (msg) {
        layer.tips(msg, $("#" + this.vid), { style: ['background-color:#4595e6;font-weight: 700;font-family:微软雅黑; color:#FFF!important', '#4595e6'], guide: 2, time: 4 });
    },
    ///弹出右边tips
    alerttipbyid: function (msg, id) {
        layer.tips(msg, $("#" + id), { style: ['background-color:#4595e6;font-weight: 700;font-family:微软雅黑; color:#FFF!important', '#4595e6'], guide: 1, time: 4 });
    },
    alert: function (msg) {
        layer.alert(msg);
    }
}
///标题
function checkbt(focus) {
    isvc.vid = "txt_bt";
    isvc.len = 4;
    if (!isvc.isempty())
        isvc.alerttip("标题不能为空");
    else if (!isvc.islength())
        isvc.alerttip("标题长度必须大于四个字符");
    else
        return true;
    if (focus)
        $("#" + isvc.vid).focus();
    return false;
}
///公司名称
function checkgs(focus) {
    isvc.vid = "txt_dw";
    isvc.len = 4;
    if (!isvc.isempty())
        isvc.alerttip("公司不能为空");
    else if (!isvc.islength())
        isvc.alerttip("公司名称长度必须大于四个字符");
        //else if (!isvc.iscompanyName())
        //    isvc.alerttip("请输入正确的公司名称");
    else
        return true;
    if (focus)
        $("#" + isvc.vid).focus();
    return false;
}
///开标地点
function checkkbdd(focus) {
    isvc.vid = "txt_kbdd";
    if (!isvc.isempty())
        isvc.alerttip("开标地点不能为空");
    else
        return true;
    if (focus)
        $("#" + isvc.vid).focus();
    return false;
}
///地区
function checkdq(focus) {
    isvc.vid = "diqu";
    if (!isvc.isempty())
        isvc.alerttip("单位所在地不能为空");
    else
        return true;
    if (focus)
        $("#" + isvc.vid).focus();
    return false;
}
///招标内容
function checkzbnr(focus) {
    isvc.vid = "txtContent";
    isvc.len = 20;
    if (!isvc.isempty())
        isvc.alert("招标内容不能为空");
    else if (!isvc.islength())
        isvc.alert("招标内容长度必须大于二十个字符");
    else
        return true;
    if (focus)
        $("#" + isvc.vid).focus();
    return false;
}
///报名开始时间
function checkbmks(focus) {
    isvc.vid = "bmkssj";
    if (!isvc.isempty())
        isvc.alerttipbyid("报名开始时间不能为空", "bmkssjshow");
    else
        return true;
    if (focus)
        $("#" + isvc.vid).focus();
    return false;
}
///报名截止时间
function checkbmjz(focus) {
    isvc.vid = "bmjzsj";
    if (!isvc.isempty())
        isvc.alerttipbyid("报名截止时间不能为空", "bmjzsjshow");
    else
        return true;
    if (focus)
        $("#" + isvc.vid).focus();
    return false;
}
///投标截止时间
function checktbjz(focus) {
    isvc.vid = "tbjzsj";
    if (!isvc.isempty())
        isvc.alerttipbyid("投标截止时间不能为空", "tbjzsjshow");
    else
        return true;
    if (focus)
        $("#" + isvc.vid).focus();
    return false;
}
///公示结果时间
function checkgsjz(focus) {
    isvc.vid = "gsjgsj";
    if (!isvc.isempty())
        isvc.alerttipbyid("公示结果时间不能为空", "gsjgsjshow");
    else
        return true;
    if (focus)
        $("#" + isvc.vid).focus();
    return false;
}
///验证用户姓名
function checkusername(focus) {
    isvc.vid = "lxrname";
    if (!isvc.isempty())
        isvc.alerttip("姓名不能为空");
    else
        return true;
    if (focus)
        $("#" + isvc.vid).focus();
    return false;
}
///验证手机号码
function checkphoneno(focus) {
    isvc.vid = "phoneno";
    if (!isvc.isempty())
        isvc.alerttipbottom("手机号码不能为空");
    else if (!isvc.isphoneno())
        isvc.alerttipbottom("手机号码格式错误");
    else
        return true;
    if (focus)
        $("#" + isvc.vid).focus();
    return false;
}
///验证验证码
function checkyzm(focus) {
    isvc.vid = "noyzm";
    if (!isvc.isempty())
        isvc.alerttip("验证码不能为空,请获取手机验证码");
    else
        return true;
    if (focus)
        $("#" + isvc.vid).focus();
    return false;
}
///是否同意
function isargee(focus) {
    isvc.vid = "noyzm";
    if ($("#ydxy").is(":checked"))
        return true;
    else
        isvc.alerttip("您还没同意《招标公告发布暂行办法》");
    if (focus)
        $("#" + isvc.vid).focus();
    return false;
}
//显示消息方法
function showtips(name, msg, ret) {
    var obj = $("#" + name);
    var posgu = 1;
    if (name == "phoneno")
        posgu = 2;
    layer.tips(msg, obj, { style: ['background-color:#4595e6;font-weight: 700;font-family:微软雅黑; color:#FFF!important', '#4595e6'], guide: posgu, time: 4 });
    if (ret)
        obj.focus();
}

///倒计时按钮
function daojishi(sz) {
    $("#Getphoneyz").attr("disabled", "disabled");
    var djs = setInterval(function () {
        var djszs = sz--;
        if (djszs <= 0) {
            clearInterval(djs);
            $("#Getphoneyz").removeAttr("disabled");
            $("#Getphoneyz").val("重新发送");
        }
        $("#Getphoneyz").val(djszs + "秒后重新发送");
    }, 1000);
}
///提交验证
var firstSub = true;
function subform() {
    if (firstSub) {
        if (checkbt(true) && checkgs(true) && checkdq(true) && checkkbdd(true) && checkzbnr(true) && checkbmks(true) && checkbmjz(true) && checktbjz(true)) {
            firstSub = false;
            if ($("input[name='radbtn_lxr']").length > 0) {
                if ($("input[name='radbtn_lxr']:checked").val() == "0") {
                    if (subinfo()) {
                        return true;
                    }
                    else {
                        firstSub = true;
                        return false;
                    }
                }
                else {
                    return true;
                }
            }
            else {
                if (subinfo()) {
                    return true;
                }
                else {
                    firstSub = true;
                    return false;
                }
            }
        }
        else {
            firstSub = true;
            return false;
        }
    } else {
        alert("正在提交，请勿重复操作");
        return false;
    }
}
///提交手机短信验证
function subinfo() {
    if (checkusername(true) && checkphoneno(true) && checkyzm(true))
        return true;
    else
        return false;
}
//post提交
function postsubmit() {
    var dataPara = getFormJson($("#form1"));
    $.ajax({
        type: "POST",
        url: "/JsonHandler/submitHandler.aspx",
        data: dataPara,
        dataType: "json",
        beforeSend: function (data) {
            $(".dianji").html("提交中..");
        },
        success: function (data) {
            if (data != null) {
                if (data.Ret) {
                    location.href = data.SUrl;
                    return true;
                } else {
                    switch (data.Msgtype) {
                        case 0:
                            showtips(data.Name, data.Msg, true);
                            break;
                        case 1:
                            layer.alert(data.Msg, 8);
                            break;
                        case 2:
                            layer.alert(data.Msg, 0, function () { data.Fn });
                            break;
                    }
                    $(".dianji").html("下一步");
                    firstSub = true;
                    return false;
                }
            } else {
                layer.alert("服务器未响应", 8);
                $(".dianji").html("下一步");
                firstSub = true;
                return false;
            }
        },
        error: function () {
            layer.alert("网络出错 ，请检查网络是否正常");
            $(".dianji").html("下一步");
            firstSub = true;
            return false;
        }
    });
}
//将form中的值转换为键值对。
function getFormJson(frm) {
    var o = {};
    var a = $(frm).serializeArray();
    $.each(a, function () {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value == $(document.getElementsByName(this.name)).attr("placeholder") ? "" : this.value);
        } else {
            o[this.name] = (this.value == $(document.getElementsByName(this.name)).attr("placeholder") ? "" : this.value);
        }
    });

    return o;
}

function allsub() {
    if (subform())
        return postsubmit();
}