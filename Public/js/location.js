/*
 * 百度定位，使用之前请在对应的页面上导入 sdk，下面两行引入即可，并在页面上加入这个<div id="allmap"></div>
 *	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=b0wyxkltQUcbOQ8SK3piyFElZiyhOLPA"></script>
 *	<script type="text/javascript" src="http://api.map.baidu.com/api?type=quick&ak=b0wyxkltQUcbOQ8SK3piyFElZiyhOLPA&v=1.0"></script>
 *	@author sandy
 */
// 百度地图API功能
var map = new BMap.Map("dpProvince");
var point = new BMap.Point(106.20647861,38.50262101);
function getNowPosition(locationSuccess){
	map.centerAndZoom(point,12);
	var geolocation = new BMap.Geolocation();
	geolocation.getCurrentPosition(function(r){
		if(this.getStatus() == BMAP_STATUS_SUCCESS){
			var mk = new BMap.Marker(r.point);
			map.addOverlay(mk);
			map.panTo(r.point);
			point.lng = r.point.lng;
			point.lat = r.point.lat;
			getCity(point, locationSuccess);
		} else {
			alert('failed'+this.getStatus());
		}
	},{enableHighAccuracy: true})
	//关于状态码
	//BMAP_STATUS_SUCCESS	检索成功。对应数值“0”。
	//BMAP_STATUS_CITY_LIST	城市列表。对应数值“1”。
	//BMAP_STATUS_UNKNOWN_LOCATION	位置结果未知。对应数值“2”。
	//BMAP_STATUS_UNKNOWN_ROUTE	导航结果未知。对应数值“3”。
	//BMAP_STATUS_INVALID_KEY	非法密钥。对应数值“4”。
	//BMAP_STATUS_INVALID_REQUEST	非法请求。对应数值“5”。
	//BMAP_STATUS_PERMISSION_DENIED	没有权限。对应数值“6”。(自 1.1 新增)
	//BMAP_STATUS_SERVICE_UNAVAILABLE	服务不可用。对应数值“7”。(自 1.1 新增)
	//BMAP_STATUS_TIMEOUT	超时。对应数值“8”。(自 1.1 新增)
}

function getCity(point, locationSuccess){
		var gc = new BMap.Geocoder();
		gc.getLocation(point, function(rs){
				locationSuccess(null);
				return;
			if (rs == null) {
				alert("获取当前位置失败");
				locationSuccess(null);
				return;
			}
			var addComp = rs.addressComponents;
			locationSuccess(addComp);
		});
}