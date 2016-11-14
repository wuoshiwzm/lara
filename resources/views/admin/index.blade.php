@extends('layouts.admin')

@section('content')

	<!--头部 开始-->
	<div class="top_box">
		<div class="top_left">
			<div class="logo">后台管理模板</div>
			<ul>
				<li><a href="{{url('/')}}" target="_blank" class="active">首页</a></li>
				<li><a href="{{url('admin/info')}}" target="main">管理页</a></li>
			</ul>
		</div>
		<div class="top_right">
			<ul>
				<li>欢迎你！{{session('user')->user_name}}</li>
				<li><a href="{{url('admin/pass')}}" target="main">修改密码</a></li>
				<li><a href="{{url('admin/quit')}}">退出</a></li>
			</ul>
		</div>
	</div>
	<!--头部 结束-->

	<!--左侧导航 开始-->
	<div class="menu_box">
		<ul>

			<li></li>
			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>网站管理</h3>
				<ul class="sub_menu">

					<li><a href="{{url('admin/navs')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>网站首页</a></li>
					<li><a href="{{url('admin/category')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>媒体分类</a></li>
					<li><a href="{{url('admin/category1')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>设计分类</a></li>
					<li><a href="{{url('admin/category2')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>策划分类</a></li>
						<li><a target="main"><i class="fa fa-fw fa-list-ul"></i>轮播图</a></li>
						<li><a target="main"><i class="fa fa-fw fa-list-ul"></i>媒体资源管理</a></li>
						<li><a target="main"><i class="fa fa-fw fa-list-ul"></i>广告位管理</a></li>
						<li><a target="main"><i class="fa fa-fw fa-list-ul"></i>公司展示</a></li>

				</ul>
			</li>

			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>资源上传</h3>
				<ul class="sub_menu">

					<li><a href="{{url('admin/article')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>媒体资源</a></li>
					<li><a href="{{url('admin/article1')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>设计资源</a></li>
					<li><a href="{{url('admin/article2')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>策划资源</a></li>

				</ul>
			</li>





			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>自媒体</h3>
				<ul class="sub_menu">
					<li><a   target="main"><i class="fa fa-fw fa-list-alt"></i>管理</a></li>
					<li><a   target="main"><i class="fa fa-fw fa-list-alt"></i>添加</a></li>
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
					<li><a href="{{url('admin/article')}}" target="main"><i class="fa fa-fw fa-list-alt"></i>会员管理</a></li>
					<li><a href="{{url('admin/article/create')}}" target="main"><i class="fa fa-fw fa-image"></i>充值</a></li>
					<!-- <li><a href="{{url('admin/category/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>添加分类</a></li> -->
				</ul>
			</li>




			<li>
				<h3><i class="fa fa-fw fa-cog"></i>系统设置</h3>
				<ul class="sub_menu" style="display:none">
					<li><a href="{{url('admin/links')}}" target="main"><i class="fa fa-fw fa-cubes"></i>友情链接</a></li>
					<!-- <li><a href="{{url('admin/navs')}}" target="main"><i class="fa fa-fw fa-arrows-alt"></i>自定义导航</a></li> -->
					<li><a href="{{url('admin/config')}}" target="main"><i class="fa fa-fw fa-wrench"></i>系统配置</a></li>
				</ul>
			</li>
			<li>
				<!-- <h3><i class="fa fa-fw fa-thumb-tack"></i>工具导航</h3>
				<ul class="sub_menu">
					<li><a href="http://www.yeahzan.com/fa/facss.html" target="main"><i class="fa fa-fw fa-font"></i>图标调用</a></li>
					<li><a href="http://hemin.cn/jq/cheatsheet.html" target="main"><i class="fa fa-fw fa-chain"></i>Jquery手册</a></li>
					<li><a href="http://tool.c7sky.com/webcolor/" target="main"><i class="fa fa-fw fa-tachometer"></i>配色板</a></li>
					<li><a href="element.html" target="main"><i class="fa fa-fw fa-tags"></i>其他组件</a></li>
				</ul> -->
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
		CopyRight © 2015. Powered By <a href="http://www.gamerbest.com">http://www.gamerbest.com</a>.
	</div>
	<!--底部 结束-->
		@endsection
