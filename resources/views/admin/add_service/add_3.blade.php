
@extends('layouts.admin')
@section('content')
<!-- 公共交通 mbus_ -->
	 <!--面包屑导航 开始-->




	 <div class="crumb_warp">
			 <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
			 <i class="fa fa-home"></i> <a href="">首页</a> &raquo; 新增资源

	 </div>
	 <!--面包屑导航 结束-->

 <!--结果集标题与导航组件 开始-->
 <div class="result_wrap">

			 <div class="result_content">
					 <div class="short_wrap">
						 <a href="{{url('admin/article/create')}}"><i class="fa fa-plus"></i>添加资源</a>
						 <a href="{{url('admin/article')}}"><i class="fa fa-refresh"></i>全部资源</a>
					 </div>
			 </div>
	 </div>
	 <!--结果集标题与导航组件 结束-->
	 <div class="result_wrap">
			 <div class="result_title">
				 <h3>添加您的资源</h3>

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
			 <form action="{{url('admin/article')}}" method="post">
				 <input type="hidden" value="{{$cate_id}}" name="cate_id">
				 <!-- <input  value="{{$cate_name}}" name="cate_name"> -->
				 <input type="hidden" value=1 name="art_type">
				 <input type="hidden" name="area_add1" value="全线">
				 <input type="hidden" name="area_add2" value="">
				 <input type="hidden" name="area_add3" value="">

				 {{csrf_field()}}
					 <table class="add_tab">
							 <tbody>

								 <tr>
										<th>public_资源得分：</th>
										<td>
												<input type="text" class="lg" name="art_title">

										</td>
								</tr>


								 <tr>
										 <th>public_资源标题：</th>
										 <td>
												 <input type="text" class="lg" name="art_title">

										 </td>
								 </tr>

								 <tr>
										 <th width="120">public_资源分类：</th>
										 <td>
													 <p>
														 对应上传资料格式：
														{{$articleadd_name}}

													 </p>
										 </td>
								 </tr>

								 <tr>
									 	 <th> public_发布人：</th>
										 <td>
										 <input type="text"  class="lg" value="{{$company_name}}" name="art_editor">
									 	</td>
								 </tr>

									 <tr>
											 <th width="120">public_展现形式：</th>
											 <td>

													 <select  name="art_form"  >

														 <option selected="selected" >请选择</option>
														 <option value="喷绘">喷绘</option>
														 <option value="视频">视频</option>
														 <option value="图片">图片</option>
														 <option value="语音">语音</option>
														 <option value="文字">文字</option>
														 <option value="灯箱">灯箱</option>
													 </select>
											 </td>
									 </tr>

									 <tr>
											 <th width="120">public_线路名称：</th>
											 <td>
													<input type="text" class="lg" name="art_name">路/号线
											 </td>
									 </tr>


									 <tr>
											 <th width="120">public_最小投放时长：</th>
											 <td>
													<input type="text" class="md" name="art_minday" >天
											 </td>
									 </tr>

									 <tr>
											 <th width="120">public_刊例价：</th>
											 <td>
													<input type="text" class="md" name="art_price" >元

													<select  name="art_price_unit" class="sm"  >
														<option selected="selected" >计费方式</option>
														<option value="1">每天</option>
														<option value="7">每周</option>
														<option value="30">每月</option>
														<option value="365">每年</option>
													</select>
											 </td>
									 </tr>


									 <tr>
											 <th width="120">public_最早投放时间：</th>
											 <td>
												  <input type="text" placeholder="最早投放时间" name="art_startdate" class="laydate-icon md" onclick="laydate()">
											 </td>
									 </tr>

									<tr>
											<th width="120">public_状态：</th>
											<td>

												<input type="radio" name="np_colorprint" value="0">待售
												<input type="radio" name="np_colorprint" value="1">已售

											</td>
									</tr>

									<tr>
										<th>public_缩略图：</th>
										<td>

										 <script src="{{asset('resources/org/uploadify/jquery.uploadify.min.js')}}" type="text/javascript"></script>
										 <link rel="stylesheet" type="text/css" href="{{asset('resources/org/uploadify/uploadify.css')}}">
										 <script type="text/javascript">
											 <?php $timestamp = time();?>
											 $(function() {
												 $('#file_upload').uploadify({
													 'buttonText':'上传图片',
													 'formData'     : {
														 'timestamp' : '<?php echo $timestamp;?>',
														 '_token'     : '{{csrf_token()}}',

													 },
													 'swf'      : "{{asset('resources/org/uploadify/uploadify.swf')}}",
													 'uploader' : "{{url('admin/upload')}}",
													 'onUploadSuccess':function(file,data,response){
														 $('input[name=art_thumb]').val(data);
														 $("#art_thumb_img").attr('src','/'+data);
													 }
												 });
											 });
										 </script>
										 <style>
										 .uploadify{display:inline-block;}
										 .uploadify-button{border:none; border-radius:5px; margin-top:8px;}
										 table.add_tab tr td span.uploadify-button-text{color: #FFF; margin:0;}
										 </style>


									 <input type="text" size="50" name="art_thumb">
									 <input id="file_upload" name="file_upload" type="file" multiple="true">


										</td>
								 </tr>

								 <tr>
										 <th> </th>
										 <td>
												 <img  id="art_thumb_img" style="max-width:350px;max-height:150px" >

										 </td>
								 </tr>

								 <tr>
 									 <th>简介</th>
 									 <td>
 										 <textarea name="art_description" class="lg">{{old('art_description')}}</textarea>
 									 </td>
 								 </tr>

									<tr>
 								 		<th>public_详细内容及板块报价图：</th>
 								 		 <td>
 								 		 <style>
 								 				.edui-default{line-height: 28px;}
 								 				div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
 								 				{overflow: hidden; height:20px;}
 								 				div.edui-box{overflow: hidden; height:22px;}
 								 			</style>
 								 		 <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/ueditor.config.js')}}"></script>
 								 		 <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/ueditor.all.min.js')}}"> </script>
 								 		 <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
 								 		 <script id="editor" name="art_content" type="text/plain" style="width:860px;height:350px;"></script>
 								 		 <script type="text/javascript">
 								 				var ue = UE.getEditor('editor');
 								 			</script>
 								 		 </td>
 								 </tr>

							 <tr>
								 <th>交通工具类型类型</th>
								 <td>
									 <select  name="mbus_type" class="md"  >
										 <option selected="selected" >公共交通类型</option>
										 <option value="地铁">地铁</option>
										 <option value="公交">公交</option>
										 <option value="火车">火车</option>
										 <option value="高铁">高铁</option>
										 <option value="飞机">飞机</option>
									 </select>
								 </td>
							 </tr>


							 <tr>
								 <th>广告位数量</th>
								 <td>
									<input type="text" class="md" name="mbus_total">
								 </td>
							 </tr>

							 <tr>
								 <th>途径主要站点</th>
								 <td>
									<textarea name="mbus_station"></textarea>
								 </td>
							 </tr>

							 <tr>
								 <th>人流量（人次/天）</th>
								 <td>
									<input type="text" class="md" name="mbus_audience"> 人次/天
								 </td>
							 </tr>

							 <tr>
								 <th>班次（班/天）</th>
								 <td>
									<input type="text" class="md" name="mbus_shift"> 班/天
								 </td>
							 </tr>


									<tr>
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

@include('layouts.tools.serviceaddjs')
@endsection
