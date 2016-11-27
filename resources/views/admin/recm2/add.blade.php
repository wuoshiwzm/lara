
@extends('layouts.admin')
@section('content')

	 <!--面包屑导航 开始-->
	 <div class="crumb_warp">
			 <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
			 <i class="fa fa-home"></i> <a href="#">首页</a> &raquo;精品推荐管理

	 </div>
	 <!--面包屑导航 结束-->

 <!--结果集标题与导航组件 开始-->
 <div class="result_wrap">
			 <div class="result_title">
					 <h3>添加精品推荐</h3>
			 </div>
			 <div class="result_content">
					 <div class="short_wrap">
						 <a href="{{url('admin/recm/create')}}"><i class="fa fa-plus"></i>添加分类</a>
						 <a href="{{url('admin/recm')}}"><i class="fa fa-refresh"></i>全部分类</a>
					 </div>
			 </div>
	 </div>
	 <!--结果集标题与导航组件 结束-->
	 <div class="result_wrap">
			 <div class="result_title">

					 @if(count($errors)>0)
							 <div class="mark">
								 @if(is_object($errors))
									 @foreach($errors->all() as $error)
											 <p>{{$error}}</p>
									 @endforeach
								 @else
									 <P>{{$errors}}</p>
								 @endif
							 </div>
					 @endif
			 </div>
	 </div>

	 <div class="result_wrap">
			 <form action="{{url('admin/recm')}}" method="post">

				 {{csrf_field()}}
					 <table class="add_tab">
							 <tbody>

									 <tr>
											 <th><i class="require">*</i>名称：</th>
											 <td>
													 <input type="text" name="recm_name">
											 </td>
									 </tr>

									 <tr>
											 <th width="120"><i class="require">*</i>选择文章：</th>
											 <td>
													 <select name=""id="recm_choose" onchange="recmChoose()">
														 <option>请选择<option>
															 @foreach($articles as $k=>$v)
																	<option value={{$v->art_id}}> {{$v->art_title}}</option>
															 @endforeach
													 </select>
											 </td>

									 </tr>

									 <!-- 把选择的文章id 加到input的value里  -->
									 <script type="text/javascript">
											function recmChoose(){
												var v = $("#recm_choose").val();
												var t = $("#recm_content").val();
												var arr = [];
												if(t!=''){
													arr.push(t);
												}
												arr.push(v);
												$("#recm_content").val(arr);
												// alert($("#recm_content").val());
											}
									 </script>

									 <tr>
											<th width="120"><i class="require">*</i>已经选择文章的ID：</th>
											<td>
												<input type="text" name="recm_content" id="recm_content" value="">
											</td>
									</tr>


									<tr>
											<th><i class="require">*</i>排序：</th>
											<td>
													<input type="text" class="sm" name="recm_order" value="0">
											</td>
									</tr>

											 <th></th>
											 <td>
													 <input type="submit" value="提交">
													 <input type="button" class="back" onclick="history.go(-1)" value="返回">
											 </td>
									 </tr>
							 </tbody>
					 </table>
			 </form>
	 </div>
@endsection
