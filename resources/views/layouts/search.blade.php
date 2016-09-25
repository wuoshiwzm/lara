
    <form id="destoon_search" action="#" onsubmit="return Dsearch(1);">
    <div class="search">

      <input type="hidden" name="moduleid" value="5" id="kw_moduleid">
      <input type="hidden" name="spread" value="0" id="destoon_spread">

        <input type="text" class="sousuo" name="kw" value="请输入关键词" onfocus="if(this.value==&#39;请输入关键词&#39;) this.value=&#39;&#39;;" onkeyup="STip(this.value);" autocomplete="off" x-webkit-speech="" speech="">
        <div>
           <select id="hangye" class="hangye" >

                <option value="5" selected="">广告媒体</option>
                <option value="5">行业搜索</option>
            </select>
        </div>
        <input type="submit" value="" class="btn">

<!-- <script>
function setModule1(i, o) {
Dd('kw_moduleid').value = i;
searchid = i;
var lis = Dd('kw_module').getElementsByTagName('li');
for(var i=0;i<lis.length;i++) {
lis[i].className = lis[i] == o ? 'current' : '';
}
}
</script> -->
    </div>
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
    </div></form>
