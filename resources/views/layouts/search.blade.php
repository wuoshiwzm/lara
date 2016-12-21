<form id="destoon_search" action="{{url('search')}}" method="get" onsubmit="return Dsearch(1);">
    <div class="search">
        <input type="text" class="sousuo" name="keywords" value="请输入关键词">
        <div>
            <select id="hangye" class="hangye" name="type">

                <option value="ad" selected="">广告媒体</option>
                <option value="design" selected="">设计资源</option>
                <option value="activity" selected="">活动策划</option>
                {{--<option value="5">行业搜索</option>--}}
            </select>
        </div>
        <input type="submit" value="" class="btn">


    </div>
</form>



