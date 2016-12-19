<!DOCTYPE HTML>
<html>
<head>
    <title>adBangBang 付款页面</title>
    <link href="{{asset('resources/views/admin/payment/css/bootstrap.css')}}" rel='stylesheet' type='text/css'/>
    <link href="{{asset('resources/views/admin/payment/css/style.css')}}" rel='stylesheet' type='text/css'/>

    <script type="text/javascript" src="{{asset('resources/views/admin/style/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/org/layer/layer.js')}}"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">


</head>
<body>


<div id="services" class="Services">
    <div class="container">
        <div>
            <h2>定制您的分享推广方案，从此轻松做分享经济时代的赢家！</h2>
            <h3>点击会弹出支付二维码！</h3>
        </div>
        <div class="service-grids">
            <div class="col-md-3 service-grid">

                <i class="icon1" id="5000l" onclick="pay(50000,6000000)">
                </i>
                <h3>50000条/60000元</h3>
            </div>

            <div class="col-md-3 service-grid">

                <i class="icon1" id="5000l" onclick="pay(10000,1400000)">
                </i>
                <h3>10000条/14000元</h3>
            </div>

            <div class="col-md-3 service-grid">

                <i class="icon1" id="5000l" onclick="pay(5000,800000)">
                </i>
                <h3>5000条/8000元</h3>
            </div>

            <div class="col-md-3 service-grid">

                <i class="icon1" id="5000l" onclick="pay(2000,400000)">
                </i>
                <h3>2000条/4000元</h3>
            </div>


            <div class="col-md-3 service-grid">

                <i class="icon1" id="5000l" onclick="pay(100,20000)">
                </i>
                <h3>100条/200元</h3>
            </div>

            <div class="col-md-3 service-grid">

                <i class="icon1" id="5000l" onclick="pay(50,10000)">
                </i>
                <h3>50条/100元</h3>
            </div>

            <div class="col-md-3 service-grid">

                <i class="icon1" id="5000l" onclick="pay(10,2000)">
                </i>
                <h3>10条/20元</h3>
            </div>


            <div class="clearfix"></div>
        </div>
    </div>
</div>

<div class="footer">
    <div class="container">
        <div class="copy-right">
            <p>Copyright &copy; 2016.Adbangbang.com All rights reserved. <a target="_blank"
                                                                            href="http://adbangbang.com/">http://adbangbang.com/</a>
            </p>
        </div>
    </div>
</div>


<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

<!-- payment function -->
<script>
    function pay(userBalance, amount) {

        $.post('{{url('set_payment')}}',
                {'_token': "{{csrf_token()}}", 'amount': amount, 'userBalance': userBalance},
                function (data) {

                    layer.open({
                        type: 1,
                        title: '付款请扫描以下二维码！',
                        shadeClose: true,
                        shade: 0.8,
                        area: ['300px', '30%'],
                        content: data //注意，如果str是object，那么需要字符拼接。
                    });
                });

    }
</script>
</body>
</html>
