@extends('layouts.admin')

@section('content')




<ul>

	<li>
		<h3><i class="fa fa-fw fa-clipboard"></i><a href="{{url('admin/company')}}"  target="main">完善企业信息</a></h3>

	</li>

	<li>
		<h3><i class="fa fa-fw fa-briefcase"></i><a href="{{url('admin/pass')}}"  target="main">公司资源管理</a></h3>

	</li>

	<li>
		<h3><i class="fa fa-fw fa-bullhorn"></i><a href="{{url('admin/pass')}}"  target="main">公司新闻发布</a></h3>

	</li>

	<li>
		<h3><i class="fa fa-fw fa-child"></i><a href="{{url('admin/pass')}}"  target="main">公司招聘</a></h3>

	</li>

	<li>
		<h3><i class="fa fa-fw fa-certificate"></i><a href="{{url('admin/pass')}}"  target="main">公司认证</a></h3>
	</li>

	<li>
		<h3><i class="fa fa-fw fa-thumbs-o-up"></i><a href="{{url('admin/pass')}}"  target="main">公司合作客户</a></h3>
	</li>

	<li>
		<h3><i class="fa fa-fw fa-fax"></i><a href="{{url('admin/pass')}}"  target="main">公司详细联系方式</a></h3>
	</li>
</ul>

	<!--结果集列表组件 结束-->
@endsection
