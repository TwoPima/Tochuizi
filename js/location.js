/*
 * 地址相关的操作
 * @author sandy
 */

var locations = {};
var LOCATIONAPINAME = {
	getArea: "get_area", //获取地址信息
	getAllArea: "area_all"
};
var LOCATIONAPI = {
	getArea: HOST + "mobile.php?c=index&a=get_area", //获取地址信息
	getAllArea: HOST + "mobile.php?c=index&a=area_all" //获取地址信息
};

locations.getlocaltionArea = function (success) {
	if (locations.getAreaFromSession()) {
		success(locations.getAreaFromSession());
	} else {
		locations.getAddress(success);
	}
}

locations.getAddress = function (success) {
	getNowPosition(function(address){
		if (address != null) {
			locations.getlocaltionAreafromServer(address, success);
		}
	});
}
// 获取城市信息
locations.getlocaltionAreafromServer =  function (address, success) {
	locations.loadAllAreaFromServer(LOCATIONAPI.getAllArea, tool.getCheckInfo(LOCATIONAPINAME.getAllArea), function(allArea){
		var resultArea = {};
		jQuery.each(allArea, function(index, area1) {
			jQuery.each(area1.sub, function(index, area2) {
				if (address.city.indexOf(area2.name) != -1) {
					resultArea.province = {name:area1.name, id:area1.code};
					resultArea.city = {name:area2.name, id:area2.code};
					locations.setAreaToSession(resultArea);
					success(resultArea);
				}
			});
		});
	});
}

//获得省市区，单级获取
locations.loadAreasFromServer =  function (areaUrl, checkInfo, pid, callback) {
	jQuery.ajax({
	   type: "GET",
	   url: areaUrl,
	   data: {checkInfo:checkInfo,pid:pid},
	   dataType:"json",
	   success: function(result){
	   	callback(result.data);
	   }
	});
}

locations.loadAllAreaFromServer =  function (areaUrl, checkInfo, callback) {
		jQuery.ajax({
	   	type: "GET",
	   	url: areaUrl,
	   	data: {checkInfo:checkInfo},
	   	dataType:"json",
	   	success: function(result){
	   	callback(result.data);
	   }
	});
}
// 根据区 Id 获取省市区详细信息
locations.getAreaWithPid = function (pid, callback) {
	locations.loadAllAreaFromServer(LOCATIONAPI.getAllArea, tool.getCheckInfo(LOCATIONAPINAME.getAllArea), function(allArea){
		var resultArea = {};
		jQuery.each(allArea, function(index, area1) {
			jQuery.each(area1.sub, function(index, area2) {
				jQuery.each(area2.sub, function(index, area3) {
					if (pid == area3.id) {
						resultArea.province = {name:area1.name, id:area1.code};
						resultArea.city = {name:area2.name, id:area2.code};
						resultArea.district = {name:area3.name, id:area3.id};
						console.log(resultArea);
						callback(resultArea);
					}
				})
			})
		})
	});
}

// 城市 Id 本地存储
locations.setAreaToSession =  function (area) {
    sessionStorage.setItem('key_area', JSON.stringify(area));
}
locations.getAreaFromSession = function () {
	return JSON.parse(sessionStorage.getItem('key_area'));
}
