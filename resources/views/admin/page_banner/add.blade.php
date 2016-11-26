
@extends('layouts.admin')
@section('content')

	 <!--面包屑导航 开始-->
	 <div class="crumb_warp">
			 <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
			 <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 自定义导航管理

	 </div>
	 <!--面包屑导航 结束-->

 <!--结果集标题与导航组件 开始-->

	 <!--结果集标题与导航组件 结束-->
	 <div class="result_wrap">
			 <div class="result_title">
				 <h3>添加自定义导航</h3>
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
					 <a href="{{url('admin/page_banner/create')}}"><i class="fa fa-plus"></i>添加横幅</a>
					 <a href="{{url('admin/page_banner')}}"><i class="fa fa-refresh"></i>全部横幅</a>
			 </div>
	 </div>





	 <div class="result_wrap">
			 <form action="{{url('admin/page_banner')}}" method="post">

				 {{csrf_field()}}
					 <table class="add_tab">
							 <tbody>

									 <tr>
											 <th><i class="require">*</i>横幅名称：</th>
											 <td>
													 <input type="text" name="page_banner_name">

													 <span><i class="fa fa-exclamation-circle yellow"></i>导航名称必须填写</span>
											 </td>
									 </tr>

									 <tr>
											 <th><i class="require">*</i>横幅链接：</th>
											 <td>
													 <input type="text" class="md" name="page_banner_url">
											 </td>
									 </tr>

									 <tr>
 										 <th><i class="require">*</i>上传图片(分辨率为1920*552)：</th>
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
 														 $('input[name=page_banner_path]').val(data);
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


 									 <input type="text" size="50" name="page_banner_path">
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
											<th>排序：</th>
											<td>
													<input type="text" class="sm" name="page_banner_order" value="0">
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
