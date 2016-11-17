<!DOCTYPE HTML>
<html>
<head>
<title>adBangBang 付款页面</title>
<link href="{{asset('resources/views/admin/payment/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('resources/views/admin/payment/css/style.css')}}" rel='stylesheet' type='text/css' />

<script type="text/javascript" src="{{asset('resources/views/admin/style/js/jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/org/layer/layer.js')}}"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">

</script>

</head>
<body>

	<!----- /start-services---->
			 <div id="services" class="Services">
	 			<div class="container">
	 					<div class="service-head">
	 						<h2>定制您的分享推广方案，从此轻松做分享经济时代的赢家！</h2>
	 					</div>
		 			<div class="service-grids">
			 				<div class="col-md-3 service-grid">

			 					<i class="icon1" id="5000l" onclick="pay(5000)">
                </i>
			 					<h3>5000元/4000条</h3>
			 				</div>



			 					<div class="col-md-3 service-grid" onclick="pay(4000)">
			 					<i class="icon2"> </i>
			 					<h3>4000元/2000条</h3>
			 				</div>
			 				<div class="col-md-3 service-grid" onclick="pay(1000)">
			 					<i class="icon3"> </i>
			 					<h3>1000元/400条</h3>
			 				</div>
			 				<div class="col-md-3 service-grid" onclick="pay(100)">
			 					<i class="icon4"> </i>
			 					<h3>100元/1条</h3>
			 				</div>

              <div class="col-md-3 service-grid" onclick="pay(1)">
                <i class="icon4"> </i>
                <h3>1分钱/什么也干不了</h3>
              </div>
		 				<div class="clearfix"> </div>
		 			</div>
	 			</div>
			 </div>
	<!----- //End-services---->
		<!----- /start-footer---->
				<div class="footer">
						<div class="container">
							<div class="copy-right">
								<p>Copyright &copy; 2016.Adbangbang.com All rights reserved. <a target="_blank" href="http://adbangbang.com/">http://adbangbang.com/</a></p>
							</div>
						</div>
					</div>


					<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
          <script type="text/javascript" src="{{asset('resources/views/payment/js/wx_setpayment.blade.php')}}"></script>
	</body>
</html>
