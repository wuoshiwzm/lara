@extends('layouts.admin')
@section('content')


    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo;求购管理
    </div>
    <!--面包屑导航 结束-->

	<!--结果页快捷搜索框 开始-->
	<div class="search_wrap">




    </div>
    <!--结果页快捷搜索框 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">

					<div class="result_title">
			 		 <h3>求购列表</h3>
			 	 </div>
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('member/offer/create')}}"><i class="fa fa-plus"></i>新增求购</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>

                        <th class="tc">ID</th>
                        <th>标题</th>
                        <th>类别</th>
                        <th>发布时间</th>
                        <th>操作</th>
                    </tr>

										@foreach($data as $v)
										<tr>


                        <td class="tc">{{$v->offer_id}}</td>
                        <td>
                            <a href="#">{{$v->offer_title}}</a>
                        </td>
                        <td>
                            <a href="#">{{$v->offer_cate_id}}</a>
                        </td>

                        <td>{{$v->created_at}}</td>

                        <td>
                            <a href="{{url('member/offer/'.$v->offer_id.'/edit')}}">修改</a>
                            <a href="javascript::" onclick="delOffer({{$v->offer_id}})">删除</a>
                        </td>
                    </tr>
										@endforeach


                </table>
                <div class="page_list">
                  {!!$data->links()!!}
                </div>
            </div>
        </div>
    </form>
<style>
	.result_content ul li span{
		font-size:15px;
		padding:6px 12px
	}
</style>


<script>
function delOffer(offer_id){

	layer.confirm('是否删除分类？', {
	  btn: ['确认','取消']
	},function(){
			$.post("{{url('member/offer/')}}/"+offer_id,{'_method':'delete','_token':"{{csrf_token()}}"},function(data){
				if(data.status==0){

					layer.msg(data.msg, {icon: 1});
          location.href = location.href;
				}
				else{
					layer.msg(data.msg, {icon: 1});
				}
			});

	},function(){

	});
}


</script>



@endsection
