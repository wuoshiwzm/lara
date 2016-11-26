@extends('layouts.admin')
	@section('content')
	<!--面包屑导航 开始-->
	<div class="crumb_warp">
			<!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
			<i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo;前台首页主流媒体
	</div>
	<!--面包屑导航 结束-->


	<!--搜索结果页面 列表 开始-->
	<form action="#" method="post">
			<div class="result_wrap">
				<div class="result_title">
					<h3>自定义主流媒体列表</h3>
				</div>
					<!--快捷导航 开始-->
					<div class="result_content">
							<div class="short_wrap">
									<a href="{{url('admin/main_media/create')}}"><i class="fa fa-plus"></i>添加媒体</a>
									<a href="{{url('admin/main_media')}}"><i class="fa fa-refresh"></i>全部媒体</a>
							</div>
					</div>
					<!--快捷导航 结束-->
			</div>

			<div class="result_wrap">
					<div class="result_content">
							<table class="list_tab">
									<tr>
											<th class="tc" width="5%">排序</th>

											<th>媒体名称</th>
											<th>导航地址</th>
											<th>英语别称</th>
											<th>操作</th>
									</tr>

									@foreach($data as $v)


									<tr>
											<td class="tc">
													<input type="text" onchange="changeOrder(this,{{$v->main_media_id}})" value="{{$v->main_media_order}}">
											</td>

											<td>
													<a href="#">{{$v->main_media_name}}</a>
											</td>

											<td>{{$v->main_media_url}}</td>

											<td>{{$v->main_media_en}}</td>

											<td>
													<a href="{{url('admin/main_media/'.$v->main_media_id.'/edit')}}">修改</a>
													<a href="javascript::" onclick="delmain_media({{$v->main_media_id}})">删除</a>
											</td>
									</tr>
									@endforeach

							</table>



					</div>
			</div>
	</form>
	<!--搜索结果页面 列表 结束-->
<script>
function changeOrder(obj,main_media_id){
	var main_media_order=$(obj).val();
	$.post("{{url('admin/main_media/changeorder')}}",{'_token':'{{csrf_token()}}','main_media_id':main_media_id,'main_media_order':main_media_order},function(data){

		if(!data.status){
			layer.msg(data.msg,{icon:6});
		}else{
			layer.msg(data.msg,{icon:5});
		}
	});
}


function delmain_media(main_media_id){

	layer.confirm('是否删除分类？', {
	  btn: ['确认','取消']
	},function(){
			$.post("{{url('admin/main_media/')}}/"+main_media_id,{'_method':'delete','_token':"{{csrf_token()}}"},function(data){
				if(data.status==0){
					location.href = location.href;
					layer.msg(data.msg, {icon: 1});
				}
				else{
					layer.msg(data.msg, {icon: 1});
				}
			});

	},function(){

	});
}


</script>



	@endsection
