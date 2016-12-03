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
    <div class="quyu">
        <select id="areaid" name="areaid" class="quyua">
            <option value="0">区域</option>
            <option value="1">默认地区</option>
        </select>
        <select id="yue" name="yue" class="quyua">
            <option value="-1">档期</option>
            <option value="01">01月</option>
            <option value="02">02月</option>
            <option value="03">03月</option>
            <option value="04">04月</option>
            <option value="05">05月</option>
            <option value="06">06月</option>
            <option value="07">07月</option>
            <option value="08">08月</option>
            <option value="09" selected="">09月</option>
            <option value="10">10月</option>
            <option value="11">11月</option>
            <option value="12">12月</option>
            <!-- <option value="3" >3天内</option>
            <option value="7" >7天内</option>
            <option value="15" >15天内</option>
            <option value="30" >30天内</option> -->
        </select>
        <!--<select id="" class="quyua">位置
            <option value="-1">位置</option>
            <option value="">地区搜索</option>
        </select>   -->
    </div>

