
@extends('layouts.admin')
@section('content')

	 <!--面包屑导航 开始-->
		 <div class="crumb_warp">
				 <i class="fa fa-bell"></i> 欢迎注册！
				 <i class="fa fa-home"></i> <a href="{{url('/')}}">首页</a>

		 </div>
	 <!--面包屑导航 结束-->

 <!--结果集标题与导航组件 开始-->
 <!-- <div class="result_wrap">
			 <div class="result_title">
					 <h3>添加分类</h3>
			 </div>
			 <div class="result_content">
					 <div class="short_wrap">
						 <a href="{{url('admin/category/create')}}"><i class="fa fa-plus"></i>添加分类</a>
						 <a href="{{url('admin/category')}}"><i class="fa fa-refresh"></i>全部分类</a>
					 </div>
			 </div>
	 </div> -->
	 <!--结果集标题与导航组件 结束-->
	 <div class="result_wrap">
			 <div class="result_title">

					 @if(count($errors)>0)

					 <?php
					//  dd($errors);
					 ?>
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
			 <form action="{{url('register')}}" method="post" role="form">


				 {{csrf_field()}}
					 <table class="add_tab">
							 <tbody>




									 <tr>
											 <th><i class="require">*</i>用户名：</th>
											 <td>
													 <input type="text" name="user_name">
											 </td>
									 </tr>
									 <tr>
											 <th><i class="require">*</i>密码：</th>
											 <td>
													 <input type="password" name="user_pass">
													 <span><i class="fa fa-exclamation-circle yellow"></i>密码最少6位</span>
											 </td>
									 </tr>

									 <tr>
											 <th><i class="require">*</i>确认密码：</th>
											 <td>
													 <input type="password" name="user_repass">
											 </td>
									 </tr>

									 <tr>
											 <th><i class="require">*</i>邮箱：</th>
											 <td>
													 <input type="text" class="md" name="user_email">
											 </td>
									 </tr>
									 <tr>
											 <th>用户类型：</th>
											 <td>
												 <select class="form-control" id="account_type" onchange="changeAccount()" name="user_class">
													 <option value="1" selected="selected">个人用户</option>
													 <option value="2">企业用户</option>
												 </select>
											 </td>
									 </tr>

									 <script type="text/javascript" >
									 $(function(){
										 	$(".company").hide();
									 });
										 function changeAccount(){

												 if($("#account_type").val() == 2){
													 $(".company").show();
												 }else if ($("#account_type").val() == 1) {
												 		$(".company").hide();
												 }
											}
									 </script>



<!--company info   -->

									 <tr class="company">
											<th><i class="require">*</i>企业名称：</th>
											<td>
													<input type="text" class="lg" name="company_name">
											</td>
									</tr>

									<tr class="company">
										 <th><i class="require">*</i>营业执照：</th>
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
															'_token'     : '{{csrf_token()}}'

														},
														'swf'      : "{{asset('resources/org/uploadify/uploadify.swf')}}",
														'uploader' : "{{url('upload')}}",
														'onUploadSuccess':function(file,data,response){
															$('input[name=company_cert]').val(data);
															$("#media_thumb_img").attr('src','/'+data);
														}
													});
												});
											</script>
											<style>
											.uploadify{display:inline-block;}
											.uploadify-button{border:none; border-radius:5px; margin-top:8px;}
											table.add_tab tr td span.uploadify-button-text{color: #FFF; margin:0;}
											</style>


										<input type="text" size="50" name="company_cert">
										<input id="file_upload" name="file_upload" type="file" multiple="true">
										<img id="media_thumb_img"   style="max-height:200px">
										</td>
								 </tr>

								 <tr class="company">
									 <th><i class="require">*</i>企业地址：</th>
									 <td>
											 <div id="distpicker" data-toggle="distpicker">
												 <select name="company_add1"></select>
												 <select name="company_add2"></select>
												 <select name="company_add3"></select>
											 </div>
										 <script src="{{asset('resources/org/ChinaAddress/js/distpicker.data.js')}}"></script>
										 <script src="{{asset('resources/org/ChinaAddress/js/distpicker.js')}}"></script>
										 <script src="{{asset('resources/org/ChinaAddress/js/main.js')}}"></script>
										 <script>
										 $("#distpicker").distpicker({
											 province: "---- 所在省 ----",
											 city: "---- 所在市 ----",
											 district: "---- 所在区 ----",
											 autoSelect: false
											 });
										 </script>
								 </td>
								 </tr>


									<tr class="company">
											<th><i class="require">*</i>联系人：</th>
											<td>
													<input type="text" name="company_contact">
											</td>
									</tr>

									<tr class="company">
											<th><i class="require">*</i>电话：</th>
											<td>
												<input type="text" name="company_tel">
											</td>
									</tr>

									<tr class="company">
											<th><i class="require">*</i>所属行业：</th>
											<td>
												<select name="company_ind" >
													<option value="" selected="selected">---请选择企业所属行业---</option>
													<?php
														foreach($ind as $k=>$v){
															echo '<option value='.$v['ind_id'].">".$v['ind_name'].'</option>';
														}
													 ?>
												 </select>
											</td>
									</tr>

									<tr class="company">
											<th>公司介绍：</th>
											<td>
													<textarea type="text" name="company_desc"></textarea>
											</td>
									</tr>

										<tr>
 												<th>完成注册：</th>
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
