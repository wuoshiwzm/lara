
@extends('layouts.admin')
@section('content')

	 <!--面包屑导航 开始-->
	 <div class="crumb_warp">
			 <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
			 <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 主流媒体管理

	 </div>
	 <!--面包屑导航 结束-->

 <!--结果集标题与导航组件 开始-->

	 <!--结果集标题与导航组件 结束-->
	 <div class="result_wrap">
			 <div class="result_title">
				 <h3>添加主流媒体</h3>
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

			 <div class="short_wrap">
					 <a href="{{url('admin/main_media/create')}}"><i class="fa fa-plus"></i>添加媒体</a>
					 <a href="{{url('admin/main_media')}}"><i class="fa fa-refresh"></i>全部媒体</a>
			 </div>
	 </div>


	 <div class="result_wrap">
			 <form action="{{url('admin/main_media/'.$field->main_media_id)}}" method="post">
				 {{method_field('put')}}		 {{csrf_field()}}
					 <table class="add_tab">
							 <tbody>

									 <tr>
											 <th><i class="require">*</i>媒体名称：</th>
											 <td>
													 <input type="text" name="main_media_name" value="{{$field->main_media_name}}">
													 <span><i class="fa fa-exclamation-circle yellow"></i>导航名称必须填写</span>
											 </td>
									 </tr>

									 <tr>
											 <th><i class="require">*</i>媒体别名：</th>
											 <td>
													 <input type="text" class="md" name="main_media_en" value="{{$field->main_media_en}}">
											 </td>
									 </tr>

									 <tr>
											 <th><i class="require">*</i>选择媒体类型：</th>
											 <td>
												 <select  name="main_media_cate_id"  class="md" >
													 <!-- <option selected="selected" value="">请选择</option> -->
													 @foreach($cate as $k=>$v)
													 	 @if($field->main_media_cate_id == $v->cate_id)
														   <option value="{{$v->cate_id}}" selected="select">{{$v->cate_name}}</option>
														 @else
													 		 <option value="{{$v->cate_id}}" >{{$v->cate_name}}</option>
													   @endif
													 @endforeach
												 </select>
											 </td>
									 </tr>


									 <tr>
											<th>排序：</th>
											<td>
													<input type="text" class="sm" name="main_media_order" value="{{$field->main_media_order}}">
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
