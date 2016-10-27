function ImgSlpShow(n) {
    for (var i = 1; i < 6; i++) {
        if (i <= n)
            document.getElementById("ImgSlp" + i).src = "/Newspaper/imagesv3/star_red_big.gif";
        else
            document.getElementById("ImgSlp" + i).src = "/Newspaper/imagesv3/star_gray_big.gif";
    }
}
function DoPingLun() {
    var star = document.getElementById("HdStar").value;
    var pinglun = document.getElementById("TxtPinglun").value;
    if (star == "" || star == "0") {
        alert("请选择星级！");
        return;
    }
    if (pinglun == "") {
        alert("请填写评论内容！");
        document.getElementById("TxtPinglun").focus();
        return;
    }
    $.ajax({
        type: "GET",
        cache: false,
        url: "/Effect/Comment.ashx?id=" + MmId + "&s=" + star + "&pl=" + encodeURIComponent(pinglun),
        success: function(msg) {
            PinglunOk(msg);
        }
    });
}
function PinglunOk(m) {
    switch (m) {
        case "1":
            alert("发表评论成功，等候管理员审核才能显示！");
            document.getElementById("TxtPinglun").value = "";
            //GetPinglun();
            break;
        case "2":
            alert("参数传递错误，请与管理员联系！");
            break;
        case "3":
            alert("请选择星级！");
            break;
        case "4":
            alert("请填写评论！");
            break;
        case "5":
            alert("数据写入错误，请与管理员联系！");
            break;
        case "6":
            alert("未知数据错误，请与管理员联系！");
            break;
        default:
            alert("未知错误，请与管理员联系！");
            break;
    }
}

function onmouseronver()
{
 alert("未上传代理证书！");
}