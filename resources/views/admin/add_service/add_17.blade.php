
@extends('layouts.admin')
@section('content')
<!-- 动画影音 -->
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
						 <a href="{{url('admin/article1/create')}}"><i class="fa fa-plus"></i>添加资源</a>
						 <a href="{{url('admin/article1')}}"><i class="fa fa-refresh"></i>全部资源</a>
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
			 <form action="{{url('admin/article1')}}" method="post">
				 <input type="hidden" value="{{$cate_id}}" name="cate_id">
				 <!-- <input  value="{{$cate_name}}" name="cate_name"> -->
				 <input type="hidden" value=1 name="art_type">

				 {{csrf_field()}}
					 <table class="add_tab">
							 <tbody>

								 <tr>
										<th>public_资源得分：</th>
										<td>
												<input type="text" class="lg" name="">

										</td>
								</tr>
								 <tr>
										<th>public_资源标题：</th>
										<td>
												<input type="text" class="lg" name="art_title">

										</td>
								</tr>
								 <tr>
										<th>public_种类：</th>
										<td>
												<select class="md" name=" art_type">
													<option selected="select">请选择</option>
													<option value="二维动画">二维动画</option>
													<option value="企业宣传片">企业宣传片</option>
													<option value="产品宣传片">产品宣传片</option>
													<option value="广告动画">广告动画</option>
													<option value="影视制作">影视制作</option>
													<option value="3D动画">3D动画</option>
													<option value="微电影">微电影</option>
													<option value="VR">VR</option>


												</select>
										</td>
								</tr>
								<tr>
									<th>public_价格(元)：</th>
 								 <td>

 									 <select class="md" id="art_price" onchange="checkandshow('#art_price','#art_price_show')">
 										 <option >请选择</option>
 										 <option value="0">固定价格</option>
 										 <option value="1">浮动价格</option>
 									 </select>
 										 <input type="text" class="md" name="art_price" id="art_price_show" style="display:none">元

 								 </td>
							 </tr>
								<tr>
									 <th>public_预计完工周期（天）：</th>
									 <td>
											 <input type="text" class="md" name="art_timelimit">天
									 </td>
							 </tr>
							 <tr>
									<th>public_最小起订金额（元）：</th>
									<td>
											<input type="text" class="md" name="art_leastpay">元
									</td>
							</tr>
								<tr>
									 <th>public_套装优惠：</th>
									 <td>
											 <select class="md" name="art_cut">
												 <option selected="selected">请选择</option>
												 <option>是</option>
												 <option>否</option>
											 </select>
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
								<th>public_详细内容：</th>
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
