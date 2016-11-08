
@extends('layouts.admin')
@section('content')
<!-- 平面设计 -->
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
													<option value="logo设计（图形，图文，文字，英文，餐饮，网站/logo）">logo设计（图形，图文，文字，英文，餐饮，网站/logo）</option>
													<option value="标志设计（  企业，产品，公司/logo ， 商标）">标志设计（  企业，产品，公司/logo ， 商标）</option>
													<option value="宣传品设计（宣传册，DM,画册，折页，彩页，手册，海报，台历，名片，工作牌，易拉宝，广告）">宣传品设计（宣传册，DM,画册，折页，彩页，手册，海报，台历，名片，工作牌，易拉宝，广告）</option>
												</select>
										</td>
								</tr>
								<tr>
									 <th>public_价格(元)：</th>
									 <td>
											 <input type="text" class="md" name="art_price">元
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
												 <option value="1">是</option>
												 <option value="0">否</option>
											 </select>
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
