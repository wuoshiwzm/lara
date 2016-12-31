@extends('layouts.admin')

@section('content')

	<!--头部 开始-->
	<div class="top_box">
		<div class="top_left">
			<div class="logo">后台管理模板</div>
			<ul>
				<li><a href="{{url('/')}}" target="_blank" class="active">首页</a></li>
				<li><a href="{{url('member/info')}}" target="main">管理页</a></li>
			</ul>
		</div>
		<div class="top_right">
			<ul>
				<li>欢迎你！{{session('user')->user_name}}</li>
				<li><a href="{{url('member/pass')}}" target="main">修改密码</a></li>
				<li><a href="{{url('member/quit')}}">退出</a></li>
			</ul>
		</div>
	</div>
	<!--头部 结束-->

	<!--左侧导航 开始-->
	<div class="menu_box">
		<ul>

			<li></li>


			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>资源管理</h3>
				<ul class="sub_menu">

					<li><a href="{{url('member/article')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>媒体资源</a></li>
					<li><a href="{{url('member/article1')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>设计资源</a></li>
					<li><a href="{{url('member/article2')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>策划资源</a></li>
					<li><a href="{{url('member/news')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>新闻资源</a></li>
					<li><a href="{{url('member/offer')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>求购信息</a></li>

				</ul>
			</li>





			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>自媒体</h3>
				<ul class="sub_menu">
					<li><a href="{{url('member/self_media')}}" target="main"><i class="fa fa-fw fa-list-alt"></i>管理</a></li>
					<!-- <li><a   target="main"><i class="fa fa-fw fa-list-alt"></i>添加</a></li> -->
				</ul>
			</li>

			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>百科资料</h3>
				<ul class="sub_menu">
					<li><a   target="main"><i class="fa fa-fw fa-list-alt"></i>管理</a></li>
					<li><a   target="main"><i class="fa fa-fw fa-list-alt"></i>添加</a></li>
				</ul>
			</li>

			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>招标招商信息</h3>
				<ul class="sub_menu">
					<li><a   target="main"><i class="fa fa-fw fa-list-alt"></i>管理</a></li>
					<li><a   target="main"><i class="fa fa-fw fa-list-alt"></i>添加</a></li>
				</ul>
			</li>





			<!--member management -->
			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>会员管理</h3>
				<ul class="sub_menu">
					<li><a  target="main" href="{{url('scanpay')}}"><i class="fa fa-fw fa-list-alt"></i>账户充值</a></li>
				</ul>
			</li>

		</ul>
	</div>
	<!--左侧导航 结束-->

	<!--主体部分 开始-->
	<div class="main_box">
		<iframe src="" frameborder="0" width="100%" height="100%" name="main"></iframe>
	</div>
	<!--主体部分 结束-->

	<!--底部 开始-->
	<div class="bottom_box">
		CopyRight © 2016-2017. Powered By <a href="http://adbangbang.com">http://adbangbang.com</a>.
	</div>
	<!--底部 结束-->
		@endsection
