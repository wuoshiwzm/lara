@extends('layouts.admin')

@section('content')
    <table class="add_tab">
        <tbody>

        <tr>
            <th width="30%"><i class="fa fa-fw fa-clipboard"></i>目前账户额度</th>
            <td>
                {{$userBalance}}
        </tr>

        <tr>
            <th width="30%"><i class="fa fa-fw fa-clipboard"></i></th>
            <td><a href="{{url('admin/company')}}" target="main">完善企业信息</a></td>
        </tr>


        <tr>
            <th width="30%"><i class="fa fa-fw fa-briefcase"></i></th>
            <td><a href="{{url('admin/pass')}}" target="main">公司资源管理</a></td>
        </tr>

        <tr>
            <th width="30%"><i class="fa fa-fw fa-bullhorn"></i></th>
            <td><a href="{{url('admin/pass')}}" target="main">公司新闻发布</a></td>
        </tr>

        <tr>
            <th width="30%"><i class="fa fa-fw fa-child"></i></th>
            <td><a href="{{url('admin/pass')}}" target="main">公司招聘</a></td>
        </tr>

        <tr>
            <th width="30%"><i class="fa fa-fw fa-certificate"></i></th>
            <td><a href="{{url('admin/pass')}}" target="main">公司认证</a></td>
        </tr>

        <tr>
            <th width="30%"><i class="fa fa-fw fa-thumbs-o-up"></i></th>
            <td><a href="{{url('admin/pass')}}" target="main">公司合作客户</a></td>
        </tr>

        <tr>
            <th width="30%"><i class="fa fa-fw fa-fax"></i></th>
            <td><a href="{{url('admin/pass')}}" target="main">公司详细联系方式</a></td>
        </tr>


        </tbody>
    </table>

    <!--结果集列表组件 结束-->
@endsection
