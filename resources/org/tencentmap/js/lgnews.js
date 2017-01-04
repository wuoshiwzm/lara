document.write('<script language="javascript" src="http://map.qq.com/api/js?v=2.exp" ></script>');

var tencentmapinit = function(lat,lng) {
	document.getElementById('container').style.height = '400px';
    var center = new qq.maps.LatLng(lat,lng);
    var map = new qq.maps.Map(document.getElementById('container'),{
        center: center,
        zoom: 13
    });
    // var infoWin = new qq.maps.InfoWindow({
    //     map: map
    // });
    // infoWin.open();
    //tips  自定义内容
    // infoWin.setContent('<div style="width:200px;padding-top:10px;">'+'我是个可爱的小孩子</div>');
    // infoWin.setPosition(center);

    var marker = new qq.maps.Marker({
	    position: center,
	    map: map
	});
	// marker.setDraggable(true);
	var cirle = new qq.maps.Circle({
	    center: center,
	    radius: 2000,
	    map: map
	});

    var updatelocalpoint = qq.maps.event.addListener(
    map,
    'click',
    function(event) {
    	marker.setPosition(event.latLng);
    	cirle.setCenter(event.latLng);
    	updateChkLocalPoint(event.latLng.getLat(), event.latLng.getLng());
    });
}

var updateChkLocalPoint = function(lat, lng) {
	$("#locallat").val(lat);
	$("#locallng").val(lng);
}