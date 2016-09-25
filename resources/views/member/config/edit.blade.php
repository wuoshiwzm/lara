
@extends('layouts.admin')
@section('content')

	 <!--面包屑导航 开始-->
	 <div class="crumb_warp">
			 <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
			 <i class="fa fa-home"></i> <a href="{{url('admin/config')}}">首页</a> &raquo; 配置项修改

	 </div>
	 <!--面包屑导航 结束-->

 <!--结果集标题与导航组件 开始-->

	 <!--结果集标题与导航组件 结束-->
	 <div class="result_wrap">
			 <div class="result_title">
				 <h3>修改配置项</h3>
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
			 <form action="{{url('admin/config/'.$field->conf_id)}}" method="post">
				 {{method_field('put')}}
				 {{csrf_field()}}
					 <table class="add_tab">
							 <tbody>

								 <tr>
										 <th><i class="require">*</i>标题：</th>
										 <td>
												 <input type="text" name="conf_title" value={{$field->conf_title}}>
												 <span><i class="fa fa-exclamation-circle yellow"></i>配置项标题必须填写</span>
										 </td>
								 </tr>

								 <tr>
											 <th><i class="require">*</i>配置项名称：</th>
											 <td>
													 <input type="text" name="conf_name" value={{$field->conf_name}}>
													 <span><i class="fa fa-exclamation-circle yellow"></i>配置项名称必须填写</span>
											 </td>
									 </tr>

									 <tr>
											<th><i class="require">*</i>类型：</th>
											<td>
													<input type ="radio" type="text" name="field_type" value="input"	onclick="showTr()" @if($field->field_type == "input") checked	@endif>input　　
													<input type ="radio" type="text" name="field_type" value="radio" onclick="showTr()" @if($field->field_type == "radio") checked	@endif >radio　　
													<input type ="radio" type="text" name="field_type" value="textarea" onclick="showTr()"@if($field->field_type == "textarea") checked	@endif >textarea　	　

											</td>
										</tr>

										<tr class="showw">
											<th><i class="require">*</i>类型值：</th>
											<td>
													<input type="text" name="field_value" class="lg" value={{$field->field_value}}>
												</td>
										</tr>
									 <tr>
											 <th><i class="require">*</i>描述：</th>
											 <td>
													 <textarea type="text" name="conf_tips">{{$field->conf_tips}}</textarea>
											 </td>
										 </tr>

										 <tr>
											<th>排序：</th>
											<td>
													<input type="text" class="sm" name="conf_order" value={{$field->conf_order}}>
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

	 <script>
	 	 showTr();


		 function showTr(){
				 var type = $('input[name=field_type]:checked').val();

				 if(type=="radio"){
					 $(".showw").show();
				 }else{
					  $(".showw").hide();
				 }
		 }


	 </script>
@endsection
