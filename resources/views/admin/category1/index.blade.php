@extends('layouts.admin')
	@section('content')
	<!--面包屑导航 开始-->
	<div class="crumb_warp">
			<!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
			<i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo;分类管理
	</div>
	<!--面包屑导航 结束-->



	<!--结果页快捷搜索框 结束-->

	<!--搜索结果页面 列表 开始-->
	<form action="#" method="post">
			<div class="result_wrap">
				<div class="result_title">
					<h3>分类列表</h3>
				</div>
					<!--快捷导航 开始-->
					<div class="result_content">
							<div class="short_wrap">
									<a href="{{url('admin/category1/create')}}"><i class="fa fa-plus"></i>添加分类</a>
									<a href="{{url('admin/category1')}}"><i class="fa fa-refresh"></i>刷新全部</a>
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
											<th>分类名称</th>
											<th>标题</th>
											<th>查看次数</th>
											<th>网址</th>
											<th>上传资料类型</th>
											<th>操作</th>
									</tr>

									@foreach($data as $v)


									<tr>
											<td class="tc">
													<input type="text" onchange="changeOrder(this,{{$v->cate_id}})" value="{{$v->cate_order}}">
											</td>
											<!-- <td class="tc">{{$v->cate_id}}</td> -->
											<td>

													<a href="#">{{$v->_cate_name}}</a>
											</td>
											<td>{{$v->cate_title}}</td>
											<td>{{$v->cate_view}}</td>
											<td><a href="{{url('cate/'.$v->cate_id)}}" target="_blank">{{url('cate1/'.$v->cate_id)}}</a></td>
											<td>

												<select class="md" onchange="changearticleadd(this,{{$v->cate_id}})" >
													@foreach($articleadd as $art)
													<option
														@if($v->cate_articleadd_id == $art['articleadd_id'])
														selected="selected"
														@endif

														value = "{{$art['articleadd_id']}}"
													>
													{{$art['articleadd_name']}}
													</option>
														@endforeach
												</select>


											</td>

											<td>
													<a href="{{url('admin/category1/'.$v->cate_id.'/edit')}}">修改</a>
													<a href="javascript::" onclick="delCate({{$v->cate_id}})">删除</a>
											</td>
									</tr>
									@endforeach

							</table>

					</div>
			</div>
	</form>
	<!--搜索结果页面 列表 结束-->
<script>
function changeOrder(obj,cate_id){
	var cate_order=$(obj).val();
	$.post("{{url('admin/cate/changeorder')}}",{'_token':'{{csrf_token()}}','cate_id':cate_id,'cate_order':cate_order},function(data){

		if(!data.status){
			layer.msg(data.msg);
		}else{
			layer.msg(data.msg,{icon:5});
		}
	});
}


function changearticleadd(obj,cate_id){
	var articleadd=$(obj).val();
	$.post("{{url('admin/cate1/changearticleadd')}}",{'_token':'{{csrf_token()}}','cate_id':cate_id,'articleadd':articleadd},function(data){

		if(!data.status){
			layer.msg(data.msg);
		}else{
			layer.msg(data.msg,{icon:5});
		}
	});
}




function delCate(cate_id){

	layer.confirm('是否删除分类？', {
	  btn: ['确认','取消']
	},function(){
			$.post("{{url('admin/category1/')}}/"+cate_id,{'_method':'delete','_token':"{{csrf_token()}}"},function(data){
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
