window.onload = function(){
/*    var newSlideSize = function slideSize(){
        var w = Math.ceil($(".swiper-container").width()/3);
        $(".swiper-container,.swiper-wrapper,.swiper-slide").height(w);
    };
    newSlideSize();
    $(window).resize(function(){
        newSlideSize();
    });*/

    var mySwiper = new Swiper('.swiper-container',{
        pagination: '.pagination',
        loop:true,
        autoplay:1000,
        paginationClickable: true,
        onSlideChangeStart: function(){
            //回调函数
        }
    });
/*    cTab("#tab1","#con1");
    cTab("#tab2","#con2");*/
	

	
};
$(function(){
	$('.head_nav span').click(function(){
		$(this).siblings('ul').slideToggle();
		
	})
})