//平台页签切换效果
function setTab(name,cursel,n){
	for(i=1;i<=n;i++){
		var menu=$("#"+name+i);
		var con=$("#con_"+name+"_"+i);		
		if(i==cursel)
		{
			$(menu).addClass("hover");
			//$(con).fadeTo("slow", 1);
			$(con).show();
		}
		else
		{
			$(menu).removeClass("hover");
			$(con).hide();
		}
	}
}





//其他切换效果
function nTabs(thisObj,Num){
if(thisObj.className == "active")return;
var tabObj = thisObj.parentNode.id;
var tabList = document.getElementById(tabObj).getElementsByTagName("li");
for(i=0; i <tabList.length; i++)
{
if (i == Num)
{
   thisObj.className = "active"; 
      document.getElementById(tabObj+"_Content"+i).style.display = "block";
}else{
   tabList[i].className = "normal"; 
   document.getElementById(tabObj+"_Content"+i).style.display = "none";
}
} 
}



//微博微信
jQuery(function($) {
	$(document).ready(function(){
		var duilian = $("div.duilian");
		if(duilian.length > 0)
		{
			var screen_w = screen.width;
			if(screen_w>1024){duilian.show();}
			var bodyHeight = $(document).height();
			var dlHeight = $(".duilian").height();
			var topHeight = $(".duilian").css("top");
			topHeight = topHeight.substring(0,topHeight.length - 2);
			topHeight = parseInt(topHeight);
			$(window).scroll(function(){
				var scrollTop = $(window).scrollTop();
				
				if(scrollTop > (bodyHeight - dlHeight))
				{
					return false;	
				}
				else
				{
					if(scrollTop > topHeight)
					{
						duilian.stop().animate({top:scrollTop + 50});
					}
					else
					{	
						duilian.stop().animate({top:topHeight});
					}
				}
			});
			$("#top").click(function(){
				$("html, body").animate({
					scrollTop: 0
				}, 1200);
			});
		}
	});
});


//添加事件响应函数的函数，与本效果无关
function addEventSimple(obj,evt,fn){
 if(obj.addEventListener){
  obj.addEventListener(evt,fn,false);
 }else if(obj.attachEvent){
  obj.attachEvent('on'+evt,fn);
 }
}
addEventSimple(window,'load',initScrolling);
//保存想要滚动的容器
var scrollingBox;
var scrollingInterval;
//用于记录是否"滚到头"过一次
var reachedBottom=false;
//记录第一次滚到头时候的scrollTop
var bottom;
//初始化滚动效果
function initScrolling(){
 scrollingBox = document.getElementById("scrollText");
 //样式设置，与滚动基本无关，应该用CSS设置。
 scrollingBox.style.height = "205px";
 scrollingBox.style.overflow = "hidden";
 //滚动
 scrollingInterval = setInterval("scrolling()",50);
 //鼠标划过停止滚动效果
 scrollingBox.onmouseover = over;
 //鼠标划出回复滚动效果
 scrollingBox.onmouseout = out; 
}
//滚动效果
function scrolling(){
 //开始滚动,origin是原来scrollTop
 var origin = scrollingBox.scrollTop++;
 //如果到头了
 if(origin == scrollingBox.scrollTop){
  //如果是第一次到头
  if(!reachedBottom){
   scrollingBox.innerHTML+=scrollingBox.innerHTML;
   reachedBottom=true;
   bottom=origin;
  }else{
   //已经到头过，只需回复头接尾的效果
   scrollingBox.scrollTop=bottom;
  }
 }
}
function over(){
 clearInterval(scrollingInterval);
}
function out(){
 scrollingInterval = setInterval("scrolling()",50);
}

//添加事件响应函数的函数，与本效果无关
function addEventSimple(obj,evt,fn){
 if(obj.addEventListener){
  obj.addEventListener(evt,fn,false);
 }else if(obj.attachEvent){
  obj.attachEvent('on'+evt,fn);
 }
}
addEventSimple(window,'load',initScrolling);
//保存想要滚动的容器
var scrollingBox;
var scrollingInterval;
//用于记录是否"滚到头"过一次
var reachedBottom=false;
//记录第一次滚到头时候的scrollTop
var bottom;
//初始化滚动效果
function initScrolling(){
 scrollingBox = document.getElementById("scrollText");
 //样式设置，与滚动基本无关，应该用CSS设置。
 scrollingBox.style.height = "205px";
 scrollingBox.style.overflow = "hidden";
 //滚动
 scrollingInterval = setInterval("scrolling()",50);
 //鼠标划过停止滚动效果
 scrollingBox.onmouseover = over;
 //鼠标划出回复滚动效果
 scrollingBox.onmouseout = out; 
}
//滚动效果
function scrolling(){
 //开始滚动,origin是原来scrollTop
 var origin = scrollingBox.scrollTop++;
 //如果到头了
 if(origin == scrollingBox.scrollTop){
  //如果是第一次到头
  if(!reachedBottom){
   scrollingBox.innerHTML+=scrollingBox.innerHTML;
   reachedBottom=true;
   bottom=origin;
  }else{
   //已经到头过，只需回复头接尾的效果
   scrollingBox.scrollTop=bottom;
  }
 }
}
function over(){
 clearInterval(scrollingInterval);
}
function out(){
 scrollingInterval = setInterval("scrolling()",50);
}



// JavaScript Document
var Speed = 1; //速度(毫秒)
var Space = 5; //每次移动(px)
var PageWidth =250; //翻页宽度
var fill = 0; //整体移位
var MoveLock = false;
var MoveTimeObj;
var Comp = 0;
var AutoPlayObj = null;
GetObj("List2").innerHTML = GetObj("List1").innerHTML;
GetObj('ISL_Cont').scrollLeft = fill;
GetObj("ISL_Cont").onmouseover = function(){clearInterval(AutoPlayObj);}
GetObj("ISL_Cont").onmouseout = function(){AutoPlay();}
AutoPlay();
function GetObj(objName){if(document.getElementById){return eval('document.getElementById("'+objName+'")')}else{return eval('document.all.'+objName)}}
function AutoPlay(){ //自动滚动
 clearInterval(AutoPlayObj);
 AutoPlayObj = setInterval('ISL_GoDown();ISL_StopDown();',3000); //间隔时间
}
function ISL_GoUp(){ //左翻开始
 if(MoveLock) return;
 clearInterval(AutoPlayObj);
 MoveLock = true;
 MoveTimeObj = setInterval('ISL_ScrUp();',Speed);
}
function ISL_StopUp(){ //左翻停止
 clearInterval(MoveTimeObj);
 if(GetObj('ISL_Cont').scrollLeft % PageWidth - fill != 0){
  Comp = fill - (GetObj('ISL_Cont').scrollLeft % PageWidth);
  CompScr();
 }else{
  MoveLock = false;
 }
 AutoPlay();
}
function ISL_ScrUp(){ //左翻动作
 if(GetObj('ISL_Cont').scrollLeft <= 0){GetObj('ISL_Cont').scrollLeft = GetObj('ISL_Cont').scrollLeft + GetObj('List1').offsetWidth}
 GetObj('ISL_Cont').scrollLeft -= Space ;
}
function ISL_GoDown(){ //右翻开始
 clearInterval(MoveTimeObj);
 if(MoveLock) return;
 clearInterval(AutoPlayObj);
 MoveLock = true;
 ISL_ScrDown();
 MoveTimeObj = setInterval('ISL_ScrDown()',Speed);
}
function ISL_StopDown(){ //右翻停止
 clearInterval(MoveTimeObj);
 if(GetObj('ISL_Cont').scrollLeft % PageWidth - fill != 0 ){
  Comp = PageWidth - GetObj('ISL_Cont').scrollLeft % PageWidth + fill;
  CompScr();
 }else{
  MoveLock = false;
 }
 AutoPlay();
}
function ISL_ScrDown(){ //右翻动作
 if(GetObj('ISL_Cont').scrollLeft >= GetObj('List1').scrollWidth){GetObj('ISL_Cont').scrollLeft = GetObj('ISL_Cont').scrollLeft - GetObj('List1').scrollWidth;}
 GetObj('ISL_Cont').scrollLeft += Space ;
}
function CompScr(){
 var num;
 if(Comp == 0){MoveLock = false;return;}
 if(Comp < 0){ //左翻
  if(Comp < -Space){
   Comp += Space;
   num = Space;
  }else{
   num = -Comp;
   Comp = 0;
  }
  GetObj('ISL_Cont').scrollLeft -= num;
  setTimeout('CompScr()',Speed);
 }else{ //右翻
  if(Comp > Space){
   Comp -= Space;
   num = Space;
  }else{
   num = Comp;
   Comp = 0;
  }
  GetObj('ISL_Cont').scrollLeft += num;
  setTimeout('CompScr()',Speed);
 }
}


/**
 * jQuery jslides 1.1.0
 *
 * http://www.cactussoft.cn
 *
 * Copyright (c) 2009 - 2013 Jerry
 *
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 */
$(function(){
	var numpic = $('#slides li').size()-1;
	var nownow = 0;
	var inout = 0;
	var TT = 0;
	var SPEED = 5000;


	$('#slides li').eq(0).siblings('li').css({'display':'none'});


	var ulstart = '<ul id="pagination">',
		ulcontent = '',
		ulend = '</ul>';
	ADDLI();
	var pagination = $('#pagination li');
	var paginationwidth = $('#pagination').width();
	$('#pagination').css('margin-left',(470-paginationwidth))
	
	pagination.eq(0).addClass('current')
		
	function ADDLI(){
		//var lilicount = numpic + 1;
		for(var i = 0; i <= numpic; i++){
			ulcontent += '<li>' + '<a href="#">' + (i+1) + '</a>' + '</li>';
		}
		
		$('#slides').after(ulstart + ulcontent + ulend);	
	}

	pagination.on('click',DOTCHANGE)
	
	function DOTCHANGE(){
		
		var changenow = $(this).index();
		
		$('#slides li').eq(nownow).css('z-index','900');
		$('#slides li').eq(changenow).css({'z-index':'800'}).show();
		pagination.eq(changenow).addClass('current').siblings('li').removeClass('current');
		$('#slides li').eq(nownow).fadeOut(400,function(){$('#slides li').eq(changenow).fadeIn(500);});
		nownow = changenow;
	}
	
	pagination.mouseenter(function(){
		inout = 1;
	})
	
	pagination.mouseleave(function(){
		inout = 0;
	})
	
	function GOGO(){
		
		var NN = nownow+1;
		
		if( inout == 1 ){
			} else {
			if(nownow < numpic){
			$('#slides li').eq(nownow).css('z-index','900');
			$('#slides li').eq(NN).css({'z-index':'800'}).show();
			pagination.eq(NN).addClass('current').siblings('li').removeClass('current');
			$('#slides li').eq(nownow).fadeOut(400,function(){$('#slides li').eq(NN).fadeIn(500);});
			nownow += 1;

		}else{
			NN = 0;
			$('#slides li').eq(nownow).css('z-index','900');
			$('#slides li').eq(NN).stop(true,true).css({'z-index':'800'}).show();
			$('#slides li').eq(nownow).fadeOut(400,function(){$('#slides li').eq(0).fadeIn(500);});
			pagination.eq(NN).addClass('current').siblings('li').removeClass('current');

			nownow=0;

			}
		}
		TT = setTimeout(GOGO, SPEED);
	}
	
	TT = setTimeout(GOGO, SPEED); 

})






