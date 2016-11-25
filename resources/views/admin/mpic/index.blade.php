@extends('layouts.admin')
	@section('content')
	<!--面包屑导航 开始-->
	<div class="crumb_warp">
			<!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
			<i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo;前台首页大型横幅
	</div>
	<!--面包屑导航 结束-->

<!--结果页快捷搜索框 开始-->


	<!--结果页快捷搜索框 结束-->

	<!--搜索结果页面 列表 开始-->
	<form action="#" method="post">
			<div class="result_wrap">
				<div class="result_title">
					<h3>自定义导航列表</h3>
				</div>
					<!--快捷导航 开始-->
					<div class="result_content">
							<div class="short_wrap">
									<a href="{{url('admin/mpic/create')}}"><i class="fa fa-plus"></i>添加横幅</a>
									<a href="{{url('admin/mpic')}}"><i class="fa fa-refresh"></i>全部横幅</a>
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
											<th>横幅名称</th>
											<th>横幅缩略图</th>
											<th>导航地址</th>
											<th>操作</th>
									</tr>

									@foreach($data as $v)


									<tr>
											<td class="tc">
													<input type="text" onchange="changeOrder(this,{{$v->mpic_id}})" value="{{$v->mpic_order}}">
											</td>

											<!-- <td class="tc">{{$v->mpic_id}}</td> -->
											<td>

													<a href="#">{{$v->mpic_name}}</a>
											</td>
											<td><img src="/{{$v->mpic_path}}"  style="max-width:350px;max-height:150px" alt="横幅图片"></td>
											<td>{{$v->mpic_url}}</td>

											<td>
													<a href="{{url('admin/mpic/'.$v->mpic_id.'/edit')}}">修改</a>
													<a href="javascript::" onclick="delMpic({{$v->mpic_id}})">删除</a>
											</td>
									</tr>
									@endforeach

							</table>







					</div>
			</div>
	</form>
	<!--搜索结果页面 列表 结束-->
<script>
function changeOrder(obj,mpic_id){
	var mpic_order=$(obj).val();
	$.post("{{url('admin/mpic/changeorder')}}",{'_token':'{{csrf_token()}}','mpic_id':mpic_id,'mpic_order':mpic_order},function(data){

		if(!data.status){
			layer.msg(data.msg,{icon:6});
		}else{
			layer.msg(data.msg,{icon:5});
		}
	});
}


function delMpic(mpic_id){

	layer.confirm('是否删除分类？', {
	  btn: ['确认','取消']
	},function(){
			$.post("{{url('admin/mpic/')}}/"+mpic_id,{'_method':'delete','_token':"{{csrf_token()}}"},function(data){
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
