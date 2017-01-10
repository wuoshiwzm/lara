@extends('layouts.member')

@section('content')

	<!--页面头部菜单-->
	<div class="warp header">
		<!--logo-->
		<div class="logo"> 
			<a href="/"><img src="{{asset('resources/views/member/style/images/logo.jpg')}}" /> </a>
		</div>
		<!--顶部菜单-->
		<div class="nav">
			<ul>
				<li><a href="/">首页</a></li>
				<li><a href="{{url('cate')}}">广告媒介</a></li>
				<li><a href="{{url('cate2')}}">策划活动</a></li>
				<li><a href="{{url('cate1')}}">创意设计</a></li>
				<li><a href="{{url('self_media')}}">全民推手</a></li>
				<li><a href="{{url('news_all')}}">行业资讯</a></li>
				<li><a href="{{url('offer_all')}}">求购</a></li>
			</ul>
		</div>
		<div class="top_right">
			<span>欢迎你！{{session('user')->user_name}}</span>
			<span><a href="{{url('member/pass')}}" target="main">修改密码</a></span>
			<span><a href="{{url('member/quit')}}">退出</a></span>
		</div>
	</div>

	<div class="warp content">
		<div class="treebox">
			<ul class="menu">
				<li class="level1">
					<a href="javascript:;">我的资源<i></i></a>
					<ul class="level2">
						<li><a href="{{url('member/article')}}" target="main">媒体资源</a></li>
						<li><a href="{{url('member/article1')}}" target="main">设计资源</a></li>
						<li><a href="{{url('member/article2')}}" target="main">策划资源</a></li>
						<li><a href="{{url('member/news')}}" target="main">新闻资源</a></li>
						<li><a href="{{url('member/offer')}}" target="main">求购信息</a></li>
					</ul>
				</li>
				<li class="level1">
					<a href="javascript:;" target="main">我的自媒体<i></i></a>
					<ul class="level2">
						<li><a href="{{url('member/self_media')}}" target="main">自媒体</a></li>
					</ul>
				</li>
	            <li class="level1">
					<a href="javascript:;">百科资料<i></i></a>
					<ul class="level2">
						<li><a href="javascript:alert('敬请期待!');" target="main">百科资料</a></li>
					</ul>
				</li>
				 <li class="level1">
					<a href="javascript:;">招标和招商<i></i></a>
					<ul class="level2">
						<li><a href="javascript:alert('敬请期待!');" target="main">招标和招商</a></li>
					</ul>
				</li>
				<li class="level1">
					<a href="javascript:;">我的账户<i></i></a>
					<ul class="level2">
						<li><a href="{{url('member/myinfo')}}" target="main">个人资料</a></li>
						<li><a href="{{url('member/info')}}" target="main">管理页</a></li>
						<li><a target="main" href="{{url('scanpay')}}">账户充值</a></li>
						<!-- <li><a href="xiaofei.html">账户余额</a></li>
						<li><a href="javascript:;">累计消费</a></li> -->
						<li><a href="{{url('member/pass')}}" target="main">修改密码</a></li>
					</ul>
				</li>
			</ul>
		</div>
		<div class="main_right">
			<iframe src="" frameborder="0" width="100%" height="100%" name="main"></iframe>
		</div>
	</div>
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
	@endsection
