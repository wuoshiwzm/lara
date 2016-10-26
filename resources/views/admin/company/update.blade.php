@extends('layouts.admin')
@section('content')
      <!-- admin-company-update -->
      	 <!--面包屑导航 开始-->
      		 <div class="crumb_warp">
      				 <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页 </a> &raquo;
               <i class="fa fa-user"></i>完善企业信息

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










      <!--company info   -->
      <?php //var_dump($comInfo); ?>
      									 <tr class="company">
      											<th><i class="require">*</i>企业名称：</th>
      											<td>
      													<input type="text" class="lg" name="company_name" value="{{$comInfo['company_name']}}">
      											</td>
      									</tr>

      									<tr class="company">
      										 <th><i class="require">*</i>营业执照：</th>
      										 <td>

      											<script src="{{asset('resources/org/uploadify/jquery.uploadify.js')}}" type="text/javascript"></script>
      											<link rel="stylesheet" type="text/css" href="{{asset('resources/org/uploadify/uploadify.css')}}">
      											<script type="text/javascript">
      												<?php $timestamp = time();?>
      												$(function() {
      													$('#file_upload').uploadify({
      														'buttonText':'上传图片',
      														'formData'     : {
      															'timestamp' : '<?php echo $timestamp;?>',
      															'_token'     : '{{csrf_token()}}',
                                    'file_size_limit':2048,

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


      										<input   type="hidden" size="50" name="company_cert">
      										<input id="file_upload" name="file_upload" type="file" multiple="true" onclick="showimg()">
                          <img id="media_thumb_img" src="{{url($comInfo['company_cert'])}}" style="max-height:200px">

                          <script>
                          function showimg(){
                            $("#img_thumb").attr('src',$("#thumb_path"));
                          }
                          </script>
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
      											 province: "{{$comInfo['company_add1']}}",
      											 city: "{{$comInfo['company_add2']}}",
      											 district: "{{$comInfo['company_add3']}}",
      											 autoSelect: false
      											 });
      										 </script>
      								 </td>
      								 </tr>


      									<tr class="company">
      											<th><i class="require">*</i>联系人：</th>
      											<td>
      													<input type="text" name="company_contact" value="{{$comInfo['company_contact']}}">
      											</td>
      									</tr>

      									<tr class="company">
      											<th><i class="require">*</i>电话：</th>
      											<td>
      													<input type="text" name="company_tel"  value="{{$comInfo['company_tel']}}">
      											</td>
      									</tr>

      									<tr class="company">
      											<th><i class="require">*</i>所属行业：</th>
      											<td>


      													<select name="company_ind" >
                                  <?php
                                    foreach($ind as $k=>$v){
                                      if($v['ind_id']==$comInfo['company_ind']){
                                        echo '<option value='.$v['ind_id'].' selected="selected">'.$v['ind_name'].'</option>';
                                        continue;
                                      }

                                      echo '<option value='.$v['ind_num'].">".$v['ind_name'].'</option>';

                                    }
                                   ?>
      											</select>
      											</td>
      									</tr>

      									<tr class="company">
      											<th>公司介绍：</th>
      											<td>
      													<textarea type="text" name="company_info">
                                {{$comInfo['company_info']}}</textarea>
      											</td>
      									</tr>

      										<tr>
       												<th>完成更新：</th>
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
