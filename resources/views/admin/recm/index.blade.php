@extends('layouts.admin')
	@section('content')
	<!--面包屑导航 开始-->
	<div class="crumb_warp">
			<!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
			<i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo;精品推荐管理
	</div>
	<!--面包屑导航 结束-->



	<!--结果页快捷搜索框 结束-->

	<!--搜索结果页面 列表 开始-->
	<form action="#" method="post">
			<div class="result_wrap">
				<div class="result_title">
					<h3>精品推荐列表</h3>
				</div>
					<!--快捷导航 开始-->
					<div class="result_content">
							<div class="short_wrap">
									<a href="{{url('admin/recm/create')}}"><i class="fa fa-plus"></i>添加精品推荐分类</a>
									<a href="{{url('admin/recm')}}"><i class="fa fa-refresh"></i>刷新全部</a>
							</div>
					</div>
					<!--快捷导航 结束-->
			</div>

			<div class="result_wrap">
					<div class="result_content">
							<table class="list_tab">
									<tr>
											<th class="tc" width="5%">排序</th>
											<!-- <th class="tc"width="5%">ID</th> -->
											<th>精品推荐名称</th>




											<th>操作</th>
									</tr>

									@foreach($data as $v)

									<tr>
											<td class="tc">
													<input type="text" onchange="changeOrder(this,{{$v->recm_id}})" value="{{$v->recm_order}}">
											</td>
											<!-- <td class="tc">{{$v->cate_id}}</td> -->
											<td>
													<a href="#">{{$v->recm_name}}</a>
											</td>


											<td>
													<a href="{{url('admin/recm/'.$v->recm_id.'/edit')}}">修改</a>
													<a href="javascript::" onclick="delRecm({{$v->recm_id}})">删除</a>
											</td>
									</tr>
									@endforeach

							</table>

					</div>
			</div>
	</form>
	<!--搜索结果页面 列表 结束-->
<script>
function changeOrder(obj,recm_id){
	var recm_order=$(obj).val();
	$.post("{{url('admin/recm/changeorder')}}",{'_token':'{{csrf_token()}}','recm_id':recm_id,'recm_order':recm_order},function(data){

		if(!data.status){
			layer.msg(data.msg);
		}else{
			layer.msg(data.msg,{icon:5});
		}
	});
}




function delRecm(recm_id){

	layer.confirm('是否删除分类？', {
	  btn: ['确认','取消']
	},function(){
			$.post("{{url('admin/recm/')}}/"+recm_id,{'_method':'delete','_token':"{{csrf_token()}}"},function(data){
				if(data.status==0){
					location.href = location.href;
					layer.msg(data.msg, {icon: 1});
				}
				else{
					layer.msg(data.msg, {icon: 2});
				}
			});
	},function(){

	});
}


</script>



	@endsection
